<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Models\Advertisement;
use App\Models\AdvertisementType;
use App\Models\Category;
use App\Models\City;
use App\Models\DeliveryTime;
use App\Models\Subscription;
use bawes\myfatoorah\MyFatoorah;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class AdvertismenetController extends Controller{
    public function create(){
        if(auth()->user()->payment_data == null){
            Alert::warning('عزيزي المشترك قم بتوثيق حسابك لتتمكن من نشر الاعلان');
            return redirect(route('my.profile.edit'));
        }

        $categories = Category::where('active' , 1)->get() ;
        $cities = City::where('active' , 1)->get() ;
        $deleviry_times = DeliveryTime::where('active' , 1)->get() ;
        $advertisement_types = AdvertisementType::where('active' , 1)->get() ;
        $subscriptions = Subscription::where('active' , 1)->get() ;
        return view('site.advertisements.create')
                ->with('categories' , $categories)
                ->with('cities' , $cities)
                ->with('deleviry_times' , $deleviry_times)
                ->with('advertisement_types' , $advertisement_types)
                ->with('subscriptions' , $subscriptions)
                ;
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
        $data['user_id'] = auth()->id() ;
        $data['end_publish_date'] = Carbon::parse($data['publish_date'])->addDays(7)->toDateString() ;
        // dd($data);
        $advertisement = Advertisement::create($data);
        if($advertisement->subscription->price != 0){
            return 'will redirect to payment page' ;
        }else{
            $advertisement->active = 1 ;
            $advertisement->save();
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
                ->with('advertisement' , $advertisement) ;
    }

   public function delete(Advertisement $advertisement , $user){
        if ( $advertisement->user_id !== (int)$user ){
            abort(404) ;
        }else{
            $advertisement->delete() ;
            Alert::success('تم حذف الاعلان');
            return redirect(route('site.dashboard')) ;
        }
   }
}
