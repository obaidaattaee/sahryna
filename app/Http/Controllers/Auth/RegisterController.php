<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Errors;
use App\Models\SmsSettings;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Providers\AppServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME ;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // 'phone' => ['required', 'regex:/(966)[0-9]{9}/', 'unique:users' , 'max:255'],
            'person_id' => ['required', 'regex:/[0-9]{9}/','unique:users' , 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'person_id' => $data['person_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'person_image' => 'avatar.png',
        ]);
        $user->attachRole('user');
        $sms_settings =  SmsSettings::first() ;
        if ($sms_settings->active == 1) {
            $this->sendCode($user , $sms_settings);
        }
        return $user ;
    }


    public function sendCode(User $user , SmsSettings $sms_settings){
        $digits = 6;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $user->code = $code;
        $user->save();
        $this->send_sms($sms_settings->user_name , $sms_settings->password , $user->phone , "asdads" , $sms_settings . $code );
    }

    function send_sms($user, $pass, $telephone, $sender, $content)
    {
        // $phone = preg_replace('/000+/', '', $telephone);
        // User From Sending Site
        // $smsUserName = $user;
        // $smsUserPass = $pass;
        // $Sender = $sender;
        // $smsSenderName = str_replace(' ', '%20', $sender);
        // $msg = str_replace(' ', '%20', $content);
        // $telephone = $str = '966' . substr($telephone, 1);
        // $sms = "http://www.waselsms.com/api.php?comm=sendsms&user=" . $smsUserName . "&pass=" . $smsUserPass . "&to=" . $telephone . "&sender=" . $smsSenderName . "&message=" . $msg;
        // $url = (string) $sms;
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        // This is what solved the issue (Accepting gzip encoding)
        // curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        // $response = curl_exec($ch);
        // curl_close($ch);
        // $dh = $response;
        // dd($dh);
        // $msg = "";
        // $result = explode(':', $dh);
        // if ($result[0] == 'u') {
        //     $msg = "تم الارسال";
        // } elseif ($result[0] == '-2') {
        //     $msg = "الرسائل غير متوفره في هذه البلد";
        // } elseif ($result[0] == '-999') {
        //     $msg = "فشل في ارسال الرسالة";
        // } elseif ($result[0] == '-100') {
        //     $msg = "خطأ في حساب المرسل";
        // } elseif ($result[0] == '-110') {
        //     $msg = "خطأ في اسم المستخدم و كلمة المرور الخاصة بحساب المرسل";
        // } elseif ($result[0] == '-111') {
        //     $msg = "حساب المرسل غير مفعل";
        // } elseif ($result[0] == '-112') {
        //     $msg = "الحساب محظور";
        // } elseif ($result[0] == '-113') {
        //     $msg = "رصيد الرسائل غير كافي";
        // } elseif ($result[0] == '-114') {
        //     $msg = "الخدمة غير متاحه";
        // } elseif ($result[0] == '-115') {
        //     $msg = "المرسل غير متاح";
        // } elseif ($result[0] == '-116') {
        //     $msg = "خطأ في اسم المرسل";
        // }
        // $arr = ['code' => $result[0], 'message' => $msg];
        try {
            $token = Http::post('https://auth.sms.to/oauth/token' , [
                'client_id' => $user ,
                'secret' => $pass ,
            ]) ;

            $response = Http::withHeaders([
                "Authorization" => $token->header('Authorization')
            ])->post('https://api.sms.to/sms/send' , [
                "message" => $content ,
                "to" => $telephone ,
            ]) ;
        } catch (\Throwable $th) {
            Errors::create([
                'message' => "يوجد مشكله في ارسال كود تاكد من المستخدمين الجدد"
            ]) ;
        }

    }

}
