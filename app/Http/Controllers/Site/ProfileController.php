<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPaymentData;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller{
    public function show () {
        $user = auth()->user() ;
        $user['payment_data'] = Crypt::decrypt($user->payment_data);
        // dd($user->payment_data['owner_card_name']) ;
        return view('site.profile.show')
                    ->with('user' , $user);
    }
    public function edit(){
        $user = auth()->user() ;
        $user['payment_data'] = Crypt::decrypt($user->payment_data);
        return view('site.profile.edit')
                ->with('user' , $user);
    }
    public function update(User $user){
        // dd(request()->all());
        $data =  request()->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/(966)[0-9]{9}/', 'max:255' , 'unique:users,phone,'.$user->id.',id'],
            'alternative_phone' => ['required', 'regex:/(966)[0-9]{9}/', 'max:255' , 'unique:users,alternative_phone,'.$user->id.',id'],
            'card.owner_card_name' => ['required' , 'string'] ,
            'card.card_number' => ['required' ] ,
            'card.card_exp_month' => ['required' , 'size:2' ] ,
            'card.card_exp_year' => ['required'  , 'size:4' ] ,
            'card.card_code' => ['required' , 'size:3'] ,
            ] , [
                'card.owner_card_name.*' => 'يرجى التاكد من بيانات مالك البطاقة  ' ,
                'card.card_number.*' => 'يرجى التاكد من  رقم البطاقة  ' ,
                'card.card_exp_month.*' => 'يرجى التاكد من  شهر انتهاء البطاقة  ' ,
                'card.card_exp_year.*' => 'يرجى التاكد من  سنه انتهاء البطاقة  ' ,
                'card.card_code.*' => 'يرجى التاكد من  كود البطاقة  ' ,
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
        $data ['payment_data'] = Crypt::encrypt($data ['card']);
        unset($data ['card']) ;
        // dd('asdasd');
        $user->update($data) ;

        session()->flash('msg' , 's: تم تعديل بياناتك بنجاح ');
        return redirect(route('my.profile'));

    }
}
