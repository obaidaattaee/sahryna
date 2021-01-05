<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        // dd(strchr(request()->email , '@') );
        if(strchr(request()->email , '@') !== false) {
            return 'email' ;
        }elseif (strchr(request()->email , '966') !== false) {
            request()['phone'] = request()->email ;
            return 'phone' ;
        }else{
            request()['person_id'] = request()->email ;
            return 'person_id' ;
        }
    }
    public function showLoginForm()
    {

        return view('auth.login') ;

    }
    protected function validateLogin(Request $request)
    {

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ] , [] , [
            $this->username() => 'المعرف' ,
        ]);
    }
}
