<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SmsSettings;
use App\Notifications\VerifyUserProfileNotification;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class CodeVerificationController extends Controller{
    public function codeVerifiy() {
        return view('auth.codeverify');
    }
    public function codeVerification(){
        $code = request()->validate([
            'code' => ['required' ,'integer' , 'digits:6'],
        ] , [] ,[
            'code' => 'كود التاكد'
        ]);
        $user =auth()->user() ;
        if($user->code !== $code['code'] ){
            Alert::warning('الكود اللذي قمت بادخاله غير صحيح . يرجى اعادة ادخال الكود الصحيح');
            return redirect(route('code.verify'));
        }
        elseif ($user->code === $code['code']) {
            $user->code = null ;
            $user->save() ;
            Notification::send($user , new VerifyUserProfileNotification('مبروك تم تاكيد هويتك بنجاح')) ;
            Alert::success('تم تاكيد رقم الهاتف بنجاح') ;
            return redirect(route("home")) ;
                }
    }
    public function codeResend(){
        $code = new RegisterController ;
        $user = auth()->user() ;
        $sms_settings = SmsSettings::first() ;
        $code->sendCode($user , $sms_settings) ;
        Alert::info('تم ارسال كود تحقق جديد');
        return redirect(route('code.verify'));
    }
}
