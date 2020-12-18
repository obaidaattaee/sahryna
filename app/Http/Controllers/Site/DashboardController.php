<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller{
    public function index() {
        $user = User::with('getMyMessageAttribute')
                    ->with('getInboxAttribute')
                    ->findOrFail(auth()->id()) ;
        DB::table('messages')->where('to' , $user->id )->update([
            'readed' => 1
        ] ) ;
        if (request()->user !== null) {
            $to_user = User::findOrFail(request()->user) ;
        }
        // dd($user->advertisemets) ;
        return view('site.dashboard.index')
                ->with('user' , $user)
                ->with('to_user' , $to_user ?? null )  ;
    }
}
