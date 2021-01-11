<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
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
        $users_ids = User::whereHas('roles', function($q){
            $q->where('id', 3);
        })->pluck('id')->toArray();
        $advertisements = Advertisement::whereIn('active' , [1,2])
                            ->where('verified' , 1)
                            ->whereIn('user_id' , $users_ids)
                            ->where('end_publish_date' , '>' , Carbon::now())
                            ->with(['city']);
        $trinds = [] ;
        UserAdvertisement::orderBy('created_at' , 'desc')->get()->groupBy('advertisement_id')->take(4)->map(function ($item) use(&$trinds){
            $trinds = array_merge($trinds , $item->pluck('advertisement_id')->toArray());
        });
        $trinds_advertisements = Advertisement::whereIn('active' , [1,2])
                            ->where('verified' , 1)
                            ->whereIn('user_id' , $users_ids)
                            ->whereIn('id' , $trinds)
                            ->where('end_publish_date' , '>' , Carbon::now())
                            ->with(['city'])->take(4)->get();
        $buyers_ids = User::whereHas('roles', function($q){
                $q->where('id', 2);
            })->pluck('id')->toArray();
        $buyers_advertisements = Advertisement::where('active' , 1)
                            ->whereIn('user_id' , $buyers_ids)
                            ->with(['city'])->take(4)->get();
        $city = request()['city'];
        $q = request()['q'];
        if ($city !== null) {

            // dd($city);
            $advertisements = $advertisements->where('city_id' , $city);

        }
        if ($q !== null) {
            // dd($city);
            $advertisements = $advertisements->where('title' , 'like' , "%{$q}%");
            $advertisements = $advertisements->where('description' , 'like' , "%{$q}%");
        }
        $advertisements = $advertisements->paginate(40) ;
        // dd($advertisements) ;
        $cities = City::where('active' , 1) -> get() ;
        return view('site.home')
                ->with('advertisements' , $advertisements)
                ->with('trinds_advertisements' , $trinds_advertisements)
                ->with('buyers_advertisements' , $buyers_advertisements)
                ->with('cities' , $cities);
    }

    public function buyerAdvertisements(){
        $users_ids = User::whereHas('roles', function($q){
                $q->where('id', 2);
            })->pluck('id')->toArray();
        $advertisements = Advertisement::where('active' , 1)
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
