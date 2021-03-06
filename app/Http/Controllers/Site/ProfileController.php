<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPaymentData;
use App\Notifications\VerifyUserProfileNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller{
    public function show () {
        $user = auth()->user() ;
        $user['payment_data'] = isset($user['payment_data']) ? decrypt($user->payment_data ) : [] ;
        // dd($user->payment_data['owner_card_name']) ;
        return view('site.profile.show')
                    ->with('user' , $user);
    }
    public function edit(){
        $user = auth()->user() ;
        $user['payment_data'] = isset($user['payment_data']) ? decrypt($user->payment_data ) : [] ;
        return view('site.profile.edit')
                ->with('user' , $user);
    }
    public function editPassword(){
        $user = auth()->user() ;
        $user['payment_data'] = isset($user['payment_data']) ? decrypt($user->payment_data ) : [] ;
        return view('site.profile.edit_password')
                ->with('user' , $user);
    }
    public function update(User $user){
        // dd(request()->all());
        $data =  request()->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/(966)[0-9]{9}/', 'max:255' , 'unique:users,phone,'.$user->id.',id'],
            'alternative_phone' => ['required', 'regex:/(966)[0-9]{9}/', 'max:255' , 'unique:users,alternative_phone,'.$user->id.',id'],
            'person_id' => ['required', 'numeric' , 'digits:9' , 'unique:users,person_id,'.$user->id.',id'],
            // 'card.owner_card_name' => ['required' , 'string'] ,
            // 'card.card_number' => ['required' ] ,
            // 'card.card_exp_month' => ['required' , 'size:2' ] ,
            // 'card.card_exp_year' => ['required'  , 'size:4' ] ,
            // 'card.card_code' => ['required' , 'size:3'] ,
            ] , [
                'card.owner_card_name.*' => 'يرجى التاكد من بيانات مالك البطاقة  ' ,
                'card.card_number.*' => 'يرجى التاكد من  رقم البطاقة  ' ,
                'card.card_exp_month.*' => 'يرجى التاكد من  شهر انتهاء البطاقة  ' ,
                'card.card_exp_year.*' => 'يرجى التاكد من  سنه انتهاء البطاقة  ' ,
                'card.card_code.*' => 'يرجى التاكد من  كود البطاقة  ' ,
            ] , [
                'alternative_phone' => "الهاتف البديل"
            ]);

        if ((request()->person_image) != null) {
            $data['person_image'] = basename(request()->person_image->store('public' , 'public'));
        }
        else {
            $data['person_image'] = $user->person_image ;
        }
        if ((request()->signature_image) != null) {
            $data['signature_image'] = basename(request()->signature_image->store('public' , 'public'));
        }else {
            $data['signature_image'] = $user->signature_image ;
        }
        // $data ['payment_data'] = encrypt($data ['card']);
        unset($data ['card']) ;

        $user->update($data) ;
        Notification::send($user , new VerifyUserProfileNotification( 'تم توثيق حسابك بنجاح' , 'تهانينا ! تم توثيق حسابك بنجاح , يمكنك الان الاستفادة من خدمات الموقع'));
        Alert::success('تم التعديل' ,'تم تعديل بياناتك بنجاح');
        return redirect(route('my.profile'));

    }
    public function userShow(User $user){
        return view('site.profile.user')
                ->with('user' , $user);
    }
    public function userAdvertisements(User $user){
        return view('site.profile.user_advertisements')
                ->with('user' , $user);
    }
    public function updatePassword(User $user){
        $data = request()->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    return $fail(__('كلمة المرور الحالية غير صحيحة.'));
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user->update([
            'password' => bcrypt($data['current_password'])
        ]);
        Alert::success('تم تعديل كلمة المرور بنجاح ');
        return redirect(route('my.profile'));
    }
    public function ShowContactData(){
        $user = auth()->user() ;
        $user->update([
            'show_phone_number' => !$user->show_phone_number
        ]);
        $user->show_phone_number == 1 ? Alert::success('تم تفعيل اظهار بيانات التواثل بنجاح') : Alert::info('تم ايقاف اظهار بيانات التواصل بينجاح') ;
        return redirect (route('my.profile'));
    }
}
