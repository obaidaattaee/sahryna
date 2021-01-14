<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Models\UserAdvertisement;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller{
    public function index() {
        // $user = User::with('getMyMessageAttribute')
        //             ->with('getInboxAttribute')
        //             ->with('advertisements.userSubscriptions')
        //             ->with('users_advertisements')
        //             ->findOrFail(auth()->id()) ;
        $user = auth()->user() ;
        $user_messages = Message::where('to' , auth()->id())
                                ->orWhere('from' , auth()->id())
                                ->with('toUser')
                                ->with('fromUser')
                                ->get()->groupBy('flag');

        if (request()->user !== null) {
            $to_user = User::findOrFail(request()->user) ;
        }
        $user_subscriptions = UserAdvertisement::where('user_id' , $user->id)->get();
        // $user_subscriptions = UserAdvertisement::where('user_id' , $user->id)->get();
        // dd($user_messages);
        // dd($user->advertisemets) ;
        return view('site.dashboard.index')
                ->with('user' , $user)
                ->with('user_subscriptions' , $user_subscriptions)
                ->with('to_user' , $to_user ?? null )
                ->with('user_messages' , $user_messages)  ;
    }
}
