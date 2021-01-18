<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\BuyerAdvertisement;
use App\Models\Category;
use App\Models\City;
use App\Models\User;
use App\Models\UserAdvertisement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $city = request()['city'];
        $category = request()['category'];
        $q = request()['q'];
        $users_ids = User::whereHas('roles', function($q){
            $q->where('id', 3);
        })->pluck('id')->toArray();
        $advertisements = Advertisement::whereIn('active' , [1,3])
                            ->where('verified' , 1)
                            ->whereIn('user_id' , $users_ids)
                            ->where('end_publish_date' , '>' , Carbon::now())
                            ->with(['city']);
        $trinds = [] ;
        UserAdvertisement::orderBy('created_at' , 'desc')->get()->groupBy('advertisement_id')->take(4)->map(function ($item) use(&$trinds){
            $trinds = array_merge($trinds , $item->pluck('advertisement_id')->toArray());
        });
        $trinds_advertisements = Advertisement::whereIn('active' , [1,3])
                            ->where('verified' , 1)
                            ->whereIn('user_id' , $users_ids)
                            ->whereIn('id' , $trinds)
                            ->where('end_publish_date' , '>' , Carbon::now())
                            ->with(['city']);
        // $buyers_ids = User::whereHas('roles', function($q){
        //         $q->where('id', 2);
        //     })->pluck('id')->toArray();
        $buyers_advertisements = BuyerAdvertisement::where('active' , 1)
                            ->with(['city']);
        if ($city !== null) {

            // dd($city);
            $advertisements = $advertisements->where('city_id' , $city);
            $trinds_advertisements =$trinds_advertisements->where('city_id' , $city);
            $buyers_advertisements =$buyers_advertisements->where('city_id' , $city);

        }
        if ($category !== null) {

            // dd($city);
            $advertisements = $advertisements->where('category_id' , $category);
            $trinds_advertisements =$trinds_advertisements->where('category_id' , $category);
            $buyers_advertisements =$buyers_advertisements->where('category_id' , $category);

        }
        if ($q !== null) {
            // dd($city);
            $advertisements = $advertisements->where('title' , 'like' , "%{$q}%")->orWhere('description' , 'like' , "%{$q}%");
            $trinds_advertisements = $trinds_advertisements->where('title' , 'like' , "%{$q}%")->orWhere('description' , 'like' , "%{$q}%");
            $buyers_advertisements = $buyers_advertisements->where('title' , 'like' , "%{$q}%")->orWhere('description' , 'like' , "%{$q}%");

        }
        $advertisements = $advertisements->paginate(40) ;
        $trinds_advertisements = $trinds_advertisements->take(4)->get() ;
        $buyers_advertisements = $buyers_advertisements->take(4)->get() ;
        // dd($advertisements) ;
        $cities = City::where('active' , 1) -> get() ;
        $categories = Category::where('active' , 1) -> get() ;
        return view('site.home')
                ->with('advertisements' , $advertisements)
                ->with('trinds_advertisements' , $trinds_advertisements)
                ->with('buyers_advertisements' , $buyers_advertisements)
                ->with('categories' , $categories)
                ->with('cities' , $cities);
    }

    public function buyerAdvertisements(){
        $users_ids = User::whereHas('roles', function($q){
                $q->where('id', 2);
            })->pluck('id')->toArray();
        $advertisements = BuyerAdvertisement::where('active' , 1)
                            ->whereIn('user_id' , $users_ids)
                            ->with(['city']);
        $city = request()['city'];
        if ($city !== null) {
            // dd($city);
            $advertisements = $advertisements->where('city_id' , $city);
        }
        $advertisements = $advertisements->paginate(40) ;

        $cities = City::where('active' , 1) -> get() ;
        return view('site.buyer_advertisements')
                ->with('advertisements' , $advertisements)
                ->with('cities' , $cities);
    }
}
