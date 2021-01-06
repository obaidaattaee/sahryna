<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Http\Requests\AdvertisementUpdateRequest;
use App\Models\Advertisement;
use App\Models\AdvertisementType;
use App\Models\Category;
use App\Models\City;
use App\Models\DeliveryTime;
use App\Models\Settings;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class AdvertisementController extends Controller{
    public function index (){
        $users_ids = User::whereHas('roles', function($q){
            $q->where('id', 3);
        })->pluck('id')->toArray();
        $advertisements = Advertisement::with('user')->with('userSubscriptions')->whereIn('user_id' , $users_ids)->get();
        // return $advertisements ;
        return view('admin.advertisements.index')
                ->with('advertisements' , $advertisements) ;
    }

    public function changeStatus(Advertisement $advertisement){
        $advertisement->update([
            'active' => !$advertisement->status,
            'verified' => !$advertisement->status ,
            'end_publish_date' => Carbon::now()->addDays(7) ,
        ]) ;
        session()->flash('msg' , 's: تم تعديل حالة الاعلان بنجاح');
        return redirect(route('advertisements.index'));
    }
    public function show (Advertisement $advertisement){
        return redirect(route('site.advertismenets.show' , [
            'advertisement' => $advertisement->id ,
            'title' => $advertisement->title
        ]));
    }
    public function delete(Advertisement $advertisement){
        $advertisement->delete() ;
        session()->flash('msg' , 'w: تم  حذف الاعلان ');
        return redirect(route('advertisements.index'));
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
        $request['images']  = json_encode($images ) ;
        $data = $request->except('imagesFiles') ;
        $advertisement->update($data);
        return redirect()->back();
    }
    public function create(){
        if(auth()->user()->payment_data == null){
            Alert::warning('عزيزي المشترك قم بتوثيق حسابك لتتمكن من نشر الاعلان');
            return redirect(route('my.profile.edit'));
        }
        // dd(auth()->user()->roles->pluck('id')->toArray());
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
        return view('site.advertisements.create')
                ->with('categories' , $categories)
                ->with('cities' , $cities)
                ->with('deleviry_times' , $deleviry_times)
                ->with('advertisement_types' , $advertisement_types)
                ->with('subscriptions' , $subscriptions);
    }
    public function buyersAdvertisements(){
        $users_ids = User::whereHas('roles', function($q){
            $q->where('id', 2);
        })->pluck('id')->toArray();
        $advertisements = Advertisement::with('user')->with('userSubscriptions')->whereIn('user_id' , $users_ids)->get();
        // return $advertisements ;
        return view('admin.advertisements.index')
                ->with('advertisements' , $advertisements) ;
    }
}
