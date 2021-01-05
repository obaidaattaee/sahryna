<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\City;
use App\Models\User;
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
        $advertisements = Advertisement::where('active' , 1)
                            ->where('verified' , 1)
                            ->where('end_publish_date' , '>' , Carbon::now())
                            ->with(['city']);

        $city = request()['city'];
        if ($city !== null) {
            // dd($city);
            $advertisements = $advertisements->where('city_id' , $city);
        }
        $advertisements = $advertisements->paginate(40) ;
        // dd($advertisements) ;
        $cities = City::where('active' , 1) -> get() ;
        return view('site.home')
                ->with('advertisements' , $advertisements)
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
