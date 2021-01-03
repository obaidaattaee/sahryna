<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Settings;
use App\Models\SmsSettings;

class SettingsController extends Controller{

    public function create(){
        $settings = Settings::first() ;
        return view('admin.settings.create')
                ->with('settings' , $settings);
    }
    public function store(){
        $data = request()->validate([
            'title' => ['required'] ,
            'description' => ['required'] ,
            'domain' => ['required'] ,
            'wellcom_message' => ['required'] ,
            'goals' => ['required'] ,
            'idea' => ['required'] ,
            'polices' => ['required'] ,
        ] , [] ,[
            'wellcom_message' => 'الرساله الترحيبية ' ,
            'domain' => 'رابط الموقع '  ,
            'goals' => 'اهداف الموقع ',
            'idea' => 'فكرة الموقع ',
            'polices' => 'الشروط و السياسة الموقع ' ,
        ]);
dd(request()->all());
        if(!empty(request()->logo_image)){
            $data['logo_image'] = basename(request()->logo_image->store('settings' , 'public'));
        }else{
            $data['logo_image'] = "ascsda";
        }
        Settings::create($data);
        session()->flash('msg' , 's: تم اضافة الاعدادت بنجاح');
        return redirect(route('admin.settings'));
    }
    public function update () {

        $data = request()->validate([
            'title' => ['required'] ,
            'description' => ['required'] ,
            'domain' => ['required'] ,
            'wellcom_message' => ['required'] ,
            'goals' => ['required'] ,
            'idea' => ['required'] ,
            'polices' => ['required'] ,
        ] , [] ,[
            'wellcom_message' => 'الرساله الترحيبية ' ,
            'domain' => 'رابط الموقع ',
            'goals' => 'اهداف الموقع ',
            'idea' => 'فكرة الموقع ',
            'polices' => 'الشروط و السياسة الموقع ' ,
        ]);
        $settings = Settings::first() ;
// dd(request()->all());
        if(!empty(request()->logo_image)){
            $data['logo_image'] = basename(request()->logo_image->store('settings' , 'public'));
        }else{
            $data['logo_image'] = $settings->logo_image;
        }
        $settings->update($data);
        session()->flash('msg' , 's: تم تعديل الاعدادت بنجاح');
        return redirect(route('admin.settings'));
    }
    public function images(){
        $settings = Settings::first();
        return view('admin.settings.images')
                ->with('settings' , $settings);
    }
    public function insertImage () {
        $settings = Settings::first() ;

        request()->validate([
            'logo_image' => ['dimensions:min_width=1000,min_height=750'],
        ] , [] , [
            'logo_image' => "صورة"
        ]);
        if(!empty(request()->logo_image)){
            $image = basename(request()->logo_image->store('settings' , 'public'));
        }else{
            session()->flash('msg' , 'w: يرجى اختيار صورة جديدة') ;
            return redirect(route('admin.settings.images'));
        }
        $new_images = [] ;
        if (isset($settings->slider_images)){
            $settings->slider_images = json_encode(array_merge((array)json_decode($settings->slider_images) , [$image])) ;
        }else{
            $new_images[0] = $image ;
            $settings->slider_images = json_encode($new_images) ;
        }
        $settings->save() ;
        return redirect(route('admin.settings.images'));
    }
    public function deleteImage () {
        $settings = Settings::first() ;
        // dd(request()->get('key')) ;
        $images =(array) json_decode($settings->slider_images ) ;
        unset($images[request()->get('key')]) ;
        // dd($images) ;

        $settings->slider_images = json_encode($images) ;
        $settings->save() ;
        return redirect(route('admin.settings.images'));
    }
    public function social(){
        $settings = Settings::first();
        return view('admin.settings.social')
                ->with('settings' , $settings);
    }
    public function insertSocial () {
        $settings = Settings::first() ;
        request()->validate([
            'title' => ['required' , 'string'] ,
            'url' => ['required'] ,
        ]);
        if(!empty(request()->social)){
            $social = basename(request()->social->store('settings' , 'public'));
        }else{
            session()->flash('msg' , 'w: يرجى اختيار صورة جديدة') ;
            return redirect(route('admin.settings.social'));
        }
        $social_data = [
            [
                'title' => request()['title'] ,
                'url'   => request()['url'] ,
                'image' => $social ,
            ],
        ];
        if (isset($settings->social)) {
            // dd((array)json_decode($settings->social));
            $settings->social = json_encode(array_merge((array)json_decode($settings->social) , $social_data));
        }
        else{
            $settings->social = json_encode($social_data) ;
        }
        $settings->save() ;
        return redirect(route('admin.settings.social'));
    }
    public function deleteSocial () {
        $settings = Settings::first() ;
        // dd(request()->get('key')) ;
        $social = (array) json_decode($settings->social ) ;
        unset($social[request()->get('key')]) ;
        // dd($images) ;

        $settings->social = json_encode($social) ;
        $settings->save() ;
        return redirect(route('admin.settings.social'));
    }
    public function sms () {
        $sms = SmsSettings::first() ;
        // dd($sms) ;
        return view('admin.settings.sms')
                ->with('sms' , $sms) ;
    }
    public function changeStatus(){
        $sms = SmsSettings::first() ;
        $sms->update([
            'active' => !$sms->active ,
        ]) ;
        session()->flash('msg' , 'تم تعديل حالة الرسائل بنجاح') ;
        return redirect(route('admin.settings.sms')) ;
    }
    public function smsUpdate(){
        $data = request()->only(['user_name' , 'password' , 'message']) ;
        SmsSettings::first()->update($data) ;
        session()->flash('msg' , 'تم تعديل بيانات بوابة الرسائل بنجاح') ;
        return redirect(route('admin.settings.sms')) ;
    }
    public function smsStore(){
        request()['active'] = request()['active'] ? 1 : 0 ;
        $data = request()->only(['user_name' , 'password' , 'message' , 'active']) ;
        SmsSettings::create($data) ;
        session()->flash('msg' , 'تم حفظ بيانات بوابة الرسائل بنجاح') ;
        return redirect(route('admin.settings.sms')) ;
    }
    public function buyerSubscriptionStatus(){
        $buyer_subscription = Settings::first();
        $buyer_subscription->update([
            'buyer_subscription' => !$buyer_subscription->buyer_subscription
        ]);

        $buyer_subscription->buyer_subscription ? session()->flash('msg' , 's: تم تفعيل الدفع للتجار ') : session()->flash('msg' , 's: تم ايقاف الدفع للتجار ');
        return redirect(route('subscriptions.index'));
    }
}
