<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\User;
use App\Models\UserAdvertisement;
use Illuminate\Support\Facades\DB;

class BaseAdminControllers extends Controller{
    function index(){
        $users = User::where('active' , 0)->get();
        $user_counter = User::count();
        $advertisements = Advertisement::with('user')->with('userSubscriptions')->with('contributes')->where('accepted' , 0)->get();
        $advertisement_counter = Advertisement::count() ;
        $advertisement_success_counter = Advertisement::with('user')->with('userSubscriptions')->with('contributes')->get()->map(function ($advetisement) {
            return  $advetisement->number_of_partners -  $advetisement->contributes->sum('number_of_parts') == 0 ? $advetisement : null ; })->filter()->all() ;

        $contributes = UserAdvertisement::select(DB::raw('YEAR(created_at) year, MONTH(created_at) month') , DB::raw('count(id) counter'))
        ->groupby('year','month')
        ->get()->map(function ($contribute) {
            return $contribute->getAttributes() ;
        } );
        // return $users ;
        return view('admin.home')
                ->with('users' , $users)
                ->with('advertisements' , $advertisements )
                ->with('user_counter' , $user_counter )
                ->with('advertisement_counter' , $advertisement_counter )
                ->with('advertisement_success_counter' , $advertisement_success_counter )
                ->with('contributes' , $contributes);
    }
}
