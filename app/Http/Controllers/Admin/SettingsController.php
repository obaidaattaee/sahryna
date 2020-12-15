<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Settings;

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
        ] , [] ,[
            'wellcom_message' => 'الرساله الترحيبية ' ,
            'domain' => 'رابط الموقع '
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
        ] , [] ,[
            'wellcom_message' => 'الرساله الترحيبية ' ,
            'domain' => 'رابط الموقع '
        ]);
        $settings = Settings::first() ;
// dd(request()->all());
        if(!empty(request()->logo_image)){
            $data['logo_image'] = basename(request()->logo_image->store('settings' , 'public'));
        }else{
            $data['logo_image'] = "ascsda";
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
        if(!empty(request()->logo_image)){
            $image = basename(request()->logo_image->store('settings' , 'public'));
        }else{
            session()->flash('msg' , 'w: يرجى اختيار صورة جديدة') ;
            return redirect(route('admin.settings.images'));
        }
        $new_images = [] ;
        if (isset($settings->slider_images)){
            $settings->slider_images = json_encode(array_merge(json_decode($settings->slider_images) , [$image])) ;
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
    public function insertSocial () {
        $settings = Settings::first() ;
        if(!empty(request()->social)){
            $image = basename(request()->logo_image->store('settings' , 'public'));
        }else{
            session()->flash('msg' , 'w: يرجى اختيار صورة جديدة') ;
            return redirect(route('admin.settings.images'));
        }
        $new_images = [] ;
        if (isset($settings->slider_images)){
            $settings->slider_images = json_encode(array_merge(json_decode($settings->slider_images) , [$image])) ;
        }else{
            $new_images[0] = $image ;
            $settings->slider_images = json_encode($new_images) ;
        }
        $settings->save() ;
        return redirect(route('admin.settings.images'));
    }
    public function deleteSocial () {
        $settings = Settings::first() ;
        // dd(request()->get('key')) ;
        $images =(array) json_decode($settings->slider_images ) ;
        unset($images[request()->get('key')]) ;
        // dd($images) ;

        $settings->slider_images = json_encode($images) ;
        $settings->save() ;
        return redirect(route('admin.settings.images'));
    }
}
