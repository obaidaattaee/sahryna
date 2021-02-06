<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MyFatoorah as ControllersMyFatoorah;
use App\Http\Requests\AdvertisementRequest;
use App\Http\Requests\AdvertisementUpdateRequest;
use App\Http\Requests\BuyerAdvertisementRequest;
use App\Models\Advertisement;
use App\Models\AdvertisementType;
use App\Models\BuyerAdvertisement;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\DeliveryTime;
use App\Models\Settings;
use App\Models\Subscription;
use App\Models\User;
use App\Models\UserAdvertisement;
use App\Models\UserLikeAdvertisement;
use App\Notifications\VerifyUserProfileNotification;
use bawes\myfatoorah\MyFatoorah;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;


class AdvertismenetController extends Controller{
    public function create(){
        $settings = Settings::first() ;
        if($settings->profile_verification == 0){
            Alert::warning('عزيزي المشترك قم بتوثيق حسابك لتتمكن من نشر الاعلان');
            return redirect(route('my.profile.edit'));
        }
        // dd(auth()->user()->roles->pluck('id')->toArray());
        $categories = Category::where('active' , 1)->get() ;
        $countries = Country::where('active' , 1)->with('cities')->get();
        $deleviry_times = DeliveryTime::where('active' , 1)->get() ;
        $advertisement_types = AdvertisementType::where('active' , 1)->get() ;


        // dd($subscriptions_roles_ids);
        $buyer_subscription = $settings->buyer_subscription;
        if ( $buyer_subscription == 0 && in_array( 2 , auth()->user()->roles->pluck('id')->toArray() ) ) {
            $subscriptions = Subscription::where('active' , 1)->whereIn('role_id'  , auth()->user()->roles->pluck('id')->toArray()  )->get() ;
        }elseif(in_array( 3 , auth()->user()->roles->pluck('id')->toArray() )){
            $subscriptions = Subscription::where('active' , 1)->whereIn('role_id'  , auth()->user()->roles->pluck('id')->toArray()  )->get() ;
        }else{
            $subscriptions = collect();
        }
        // dd($countries );
        return view('site.advertisements.create')
                ->with('categories' , $categories)
                ->with('countries' , $countries)
                ->with('deleviry_times' , $deleviry_times)
                ->with('advertisement_types' , $advertisement_types)
                ->with('subscriptions' , $subscriptions);
    }
    public function store(AdvertisementRequest $request){
        $request['distribute_cost'] = $request['distribute_cost'] ? 1 : 0 ;
        $data = $request->validated();
        // dd($data) ;

        $images = [] ;
        if($request["imagesFiles"] != null){
            foreach($request["imagesFiles"] as $image){
                 array_push($images , basename($image->store('images' , 'public'))) ;
            }
        }
        $data['images'] = json_encode($images) ;
        unset($data ['imagesFiles']) ;
        unset($data ['possible']) ;
        $data['user_id'] = auth()->id() ;
        if (isset($data['subscription_id'] )) {


            $subscription = Subscription::findOrFail($data['subscription_id']) ;
            $data['end_publish_date'] = Carbon::parse($data['publish_date'])->addDays($subscription->time_day)->toDateString() ;
            // dd($data);
            $advertisement = Advertisement::create($data);
            session()->put('advertisement' , [
                'advertisement_id' => $advertisement->id ,
                'user_id' => $advertisement->user_id ,
            ]);

            if($advertisement->subscription->price != 0){

                $invoice_params = [
                    "InvoiceValue" => (float)$subscription->price,
                    "CustomerName" => auth()->user()->user_name,
                    "CountryCodeId" => 1,
                    "CustomerMobile" => substr(auth()->user()->phone , 2 ),
                    "CustomerEmail" => auth()->user()->email,
                    "DisplayCurrencyId" => 1,
                    "SendInvoiceOption" => 1,
                    'DisplayCurrencyIsoAlpha' => 'SAR',
                    'CountryCodeId' => '+966',
                    'DisplayCurrencyId' => 2,
                    "InvoiceItems" => [
                        "ProductName"=> (string)$advertisement->title,
                        "UnitPrice"=> (string)$subscription->price,
                        "Quantity"=> "1",
                        "ExtendedAmount"=> "1,200.00"
                    ] ,
                    "CallBackUrl" => route('site.payment.callback'),
                    "Language"=> 1,
                    "adv_id" =>  $advertisement->id ,
                ];

                $myfatoorah = new ControllersMyFatoorah ;
                $result = $myfatoorah->createProductInvoice($invoice_params);
                // dd($result);
                return isset($result['RedirectUrl']) ? redirect()->to($result['RedirectUrl']) : back()->with('error', (string) $result["Message"]);
            }else{
                $advertisement->active = 1 ;
                $advertisement->verified = 1 ;
                $advertisement->save();
                Alert::success('تم اضافة اعلانك بنجاح') ;
                return redirect(route('home'));
            }
        }else{
            $data['subscription_id'] = null ;
            $data['end_publish_date']  = $data['publish_date']  ;
            $data['active']  = 1 ;

            $advertisement = Advertisement::create($data);
            Alert::alert('تم اضافة اعلانك بنجاح') ;
            return redirect(route('main'));
        }

    }
    public function show(Advertisement $advertisement){
        if(!$advertisement->end_publish_date >= Carbon::now() || !$advertisement->active){
            Alert::warning('هذا الاعلان تم ايقافه');
        }
        // dd($advertisement);
        // dd(Carbon::parse($advertisement->end_publish_date)->diffForHumans());
        return view('site.advertisements.show')
                ->with('settings' , Settings::first())
                ->with('advertisement' , $advertisement) ;
    }

   public function delete(Advertisement $advertisement , $user){
        if ( $advertisement->reminnig_contributes !==  $advertisement->number_of_partners) {
            Alert::warning('عذرا لا يمكن حذف العلان لوجود طلبات مشاركة');
            return redirect(route('site.dashboard')) ;
        }
        if ( $advertisement->user_id !== (int)$user  ){
            abort(404) ;
        }else{
            $advertisement->delete() ;
            Alert::success('تم حذف الاعلان');
            return redirect(route('site.dashboard')) ;
        }
   }
   public function addSubscription(User $user , Advertisement $advertisement){
        $subscripes_number = $advertisement->number_of_partners - $advertisement->userSubscriptions()->sum("number_of_parts") ;
        $data = request()->validate([
            'number_of_parts' => ['required' , 'numeric' ,'max:'.$subscripes_number]
        ], [] , [
            'number_of_parts' => 'الحصص'
        ]);
        $data['code'] = $this->generateRandomString(8);
        $data['status'] = 0;
        $data['user_id'] = $user->id;
        $data['advertisement_id'] = $advertisement->id;

        $contribute = UserAdvertisement::create($data);
        if ($advertisement->number_of_partners - $advertisement->contributes()->sum('number_of_parts') == 0) {
            UserAdvertisement::where('advertisement_id'  , $advertisement->id)->update([
                'status' => 1
            ]);
            $advertisement->update([
                'active' => 2
            ]);
            Notification::send($user , new VerifyUserProfileNotification('تم اضافة شراكتك بنجاح'  , 'تم اضافة شراكتك بنجاح , و سيتم التواصل معكم خلال ' . $advertisement->deleveiryTime->time_day . " " .  $advertisement->deleveiryTime->description . " " . " من طرف المعلن لاستلام البضاعة" )) ;
            Notification::send($advertisement->user , new VerifyUserProfileNotification('تهانينا لقد اكتمل الشركاء للاعلان  '. " " . $advertisement->title , 'عزيزي المشترك تم اكتمال عدد الشركاء للاعلان  ' . " " . $advertisement->title ." " ."لذلك يتوجب عليك تسليم المنتج خلال مدة لا تزيد عن " . $advertisement->deleveiryTime->time_day . " " .  $advertisement->deleveiryTime->description )) ;
            Alert::success( 'تم اضافة شراكتك بنجاح , و سيتم التواصل معكم خلال'  . $advertisement->deleveiryTime->time_day . " " .  $advertisement->deleveiryTime->description . " " . " من طرف المعلن لاستلام البضاعة" );
            return redirect(route('home'));
        }
        Notification::send($user , new VerifyUserProfileNotification('تم اضافة شراكتك بنجاح ' ,'تم اضافة شراكتك بنجاح , سيتم مراجعتها من طرف المعلن و اشعارك في حالة القبول ')) ;
        Notification::send($advertisement->user , new VerifyUserProfileNotification('عزيزي المعلن , يوجد لديك طلب مشاركة '  , 'عزيزي المعلن , يوجد لديك طلب مشاركة على اعلانك رقم' .$advertisement->id)) ;
        Alert::success('تم اضافة شراكتك بنجاح , سيتم مراجعتها من طرف المعلن و اشعارك في حالة القبول ');
        return redirect(route('site.advertismenets.show' , ['advertisement'=>$advertisement->id , 'title'=>$advertisement->title]));
   }
   public function deleteSubscription(User $user , Advertisement $advertisement , UserAdvertisement $subscription){
        if ($subscription->advertisement()->first()->reminnig_contributes == 0) {
            Alert::warning('عذرا لايمكنك الانسحاب من الشراكة لاكتمال عدد الشركاء في هذا الاعلان');
            return redirect(route('site.dashboard')) ;
        }
        $subscription->delete() ;
        Alert::success('تم سحب شراكتك بنجاح');
        return redirect(route('site.dashboard')) ;
    }

   public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function contributeCode(){
        return  view('site.dashboard.verify_code') ;
    }
    public function contributeCodeVerify(){
        $code = request()->validate([
            'code' => ['required' , 'size:8']
        ] , [] , ['code' => "كود التحقق"]);
        $contribute = UserAdvertisement::where('code' , $code['code'])->first();
        if ($contribute == null) {
            Alert::warning('الكود اللذي قمت بادخاله غير صحيح يرجى التاكد');
            return redirect(route('contribute.code'));
        }
        switch ($contribute->status) {
            case 0:
                Alert::info('لم يكتمل عدد الشركاء لهذا العلان');
                break;
            case 2:
                Alert::info('هذا المنتج تم تسليمة ');
                break;

        }
        return view('site.dashboard.product_details')
                    ->with('contribute' , $contribute) ;
    }
    public function contributeCompleteVerify(){
        $id = request()->validate([
            'id' => ['required' , 'exists:users_advertisements']
        ] , [] , ['code' => "كود التحقق"]);

        $contribute = UserAdvertisement::findOrFail($id['id']);
        $contribute->update([
            'status' => 2
        ]);

        Alert::warning('شكرا لتعاملكم معنا ');
        return redirect(route('site.dashboard'));

    }
    public function edit(Advertisement $advertisement){
        $categories = Category::where('active' , 1)->get() ;
        $cities = City::where('active' , 1)->get() ;
        $deleviry_times = DeliveryTime::where('active' , 1)->get() ;
        $advertisement_types = AdvertisementType::where('active' , 1)->get() ;


        // dd($subscriptions_roles_ids);
        $buyer_subscription = Settings::first()->buyer_subscription;
        if ( $buyer_subscription == 0 && in_array( 2 , auth()->user()->roles->pluck('id')->toArray() ) ) {
            $subscriptions = Subscription::where('active' , 1)->whereIn('role_id'  , auth()->user()->roles->pluck('id')->toArray()  )->get() ;
        }elseif(in_array( 3 , auth()->user()->roles->pluck('id')->toArray() )){
            $subscriptions = Subscription::where('active' , 1)->whereIn('role_id'  , auth()->user()->roles->pluck('id')->toArray()  )->get() ;
        }else{
            $subscriptions = collect();
        }
        return view('site.advertisements.edit')
                ->with('categories' , $categories)
                ->with('cities' , $cities)
                ->with('deleviry_times' , $deleviry_times)
                ->with('advertisement_types' , $advertisement_types)
                ->with('subscriptions' , $subscriptions)
                ->with('adv' , $advertisement);

    }
    public function update(AdvertisementUpdateRequest $request , Advertisement $advertisement){
        $images = [] ;
        if($request["imagesFiles"] != null){
            foreach($request["imagesFiles"] as $image){
                 array_push($images , basename($image->store('images' , 'public'))) ;
            }
        }
        if (count($images) > 0) {
            $request['images']  = json_encode($images ) ;
        }else{
            $request['images']  = $advertisement->images ;
        }
        $data = $request->except('imagesFiles') ;
        dd($data);
        $advertisement->update($data);
        session()->flash('msg' , 'تم تعديل الاعلان بنجاح');
        Alert::success('تم تعديل الاعلان بنجاح');
        return redirect()->back();
    }
    public function buyerAdvertisementsStore(BuyerAdvertisementRequest $request){
        $data = $request->all();
        $images = [] ;
        if($request["imagesFiles"] != null){
            foreach($request["imagesFiles"] as $image){
                array_push($images , basename($image->store('images' , 'public'))) ;
            }
        }
        $data['images'] = json_encode($images) ;
        unset($data ['imagesFiles']) ;
        $data['user_id'] = auth()->id() ;
        if (isset($data['subscription_id'] )) {


            $subscription = Subscription::findOrFail($data['subscription_id']) ;
            $data['end_publish_date'] = Carbon::parse($data['publish_date'])->addDays($subscription->time_day)->toDateString() ;
            // dd($data);
            $advertisement = BuyerAdvertisement::create($data);
            session()->put('advertisement' , [
                'advertisement_id' => $advertisement->id ,
                'user_id' => $advertisement->user_id ,
            ]);

            if($advertisement->subscription->price != 0){

                $invoice_params = [
                    "InvoiceValue" => (float)$subscription->price,
                    "CustomerName" => auth()->user()->user_name,
                    "CountryCodeId" => 1,
                    "CustomerMobile" => substr(auth()->user()->phone , 2 ),
                    "CustomerEmail" => auth()->user()->email,
                    "DisplayCurrencyId" => 1,
                    "SendInvoiceOption" => 1,
                    'DisplayCurrencyIsoAlpha' => 'SAR',
                    'CountryCodeId' => '+966',
                    'DisplayCurrencyId' => 2,
                    "InvoiceItems" => [
                        "ProductName"=> (string)$advertisement->title,
                        "UnitPrice"=> (string)$subscription->price,
                        "Quantity"=> "1",
                        "ExtendedAmount"=> "1,200.00"
                    ] ,
                    "CallBackUrl" => route('site.payment.callback'),
                    "Language"=> 1,
                    "adv_id" =>  $advertisement->id ,
                ];

                $myfatoorah = new ControllersMyFatoorah ;
                $result = $myfatoorah->createProductInvoice($invoice_params);
                // dd($result);
                return isset($result['RedirectUrl']) ? redirect()->to($result['RedirectUrl']) : back()->with('error', (string) $result["Message"]);
            }else{
                $advertisement->active = 1 ;
                $advertisement->verified = 1 ;
                $advertisement->save();
                Alert::success('تم اضافة اعلانك بنجاح') ;
                return redirect(route('home'));
            }
        }else{
            $data['subscription_id'] = null ;
            $data['end_publish_date'] = Carbon::now()   ;
            $data['publish_date'] = Carbon::now() ;
            $data['active']  = 1 ;
            $advertisement = BuyerAdvertisement::create($data);
            Alert::alert('تم اضافة اعلانك بنجاح') ;
            return redirect(route('main'));
        }
    }
    public function addLike(Advertisement $advertisement){
        $user = auth()->user() ;
        $like = UserLikeAdvertisement::firstOrNew([
            'user_id' => $user->id ,
            'advertisement_id' => $advertisement->id
        ]);
        $like->save() ;
        if($like->wasRecentlyCreated){
            Alert::success('تم اضافة الاعلان الى المفضله');
            return redirect()->back() ;
        }else{
            $like->delete() ;
            Alert::info('تم ازالة الاعلان من المفضله');
            return redirect()->back() ;
        }

    }
}
