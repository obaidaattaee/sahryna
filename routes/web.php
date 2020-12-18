<?php

use App\Http\Controllers\Admin\BaseAdminControllers;
use App\Models\Advertisement;
use App\Models\User;
use App\Notifications\Notifications;
use App\Notifications\SendVerifyCodeNotification;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('home'));

})->name('main');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth' , 'role:super_admin')->group(function(){
    Route::get('/' , [BaseAdminControllers::class , 'index'])->name('admin.index');
    // start user routes
    Route::resource('users' , 'App\Http\Controllers\Admin\UserCntroller') ;
    Route::get('users/{user}/change_status' ,"App\Http\Controllers\Admin\UserCntroller@changeStatus" )->name('users.change.status');
    Route::get('users/{user}/change_delete_status' ,"App\Http\Controllers\Admin\UserCntroller@changeDeleteStatus" )->name('users.change.delete.status');
    Route::get('users/users/inactive' ,"App\Http\Controllers\Admin\UserCntroller@inactiveUsers" )->name('users.inactive');
    Route::get('users/users/deleted' ,"App\Http\Controllers\Admin\UserCntroller@deletedUsers" )->name('users.deleted');
    // end user routes

    // start roles routes
    Route::resource('roles' , 'App\Http\Controllers\Admin\RoleController')->except('show , destroy') ;
    Route::get('roles/{role}/delete' , 'App\Http\Controllers\Admin\RoleController@delete')->name('roles.destroy') ;
    // end roles routes

    // start categories routes
    Route::resource('categories' , 'App\Http\Controllers\Admin\CategoryController')->except('show , destroy') ;
    Route::get('categories/{category}/delete' , 'App\Http\Controllers\Admin\CategoryController@delete')->name('categoies.destroy') ;
    Route::get('categories/{category}/status' , 'App\Http\Controllers\Admin\CategoryController@changeStatus')->name('categories.cahnge.states') ;
    // end categories routes

    // start categories routes
    Route::resource('advertisement_types' , 'App\Http\Controllers\Admin\AdvertisementTypeController')->except('show , destroy') ;
    Route::get('advertisement_types/{advertisement_type}/delete' , 'App\Http\Controllers\Admin\AdvertisementTypeController@delete')->name('advertisement_types.destroy') ;
    Route::get('advertisement_types/{advertisement_type}/status' , 'App\Http\Controllers\Admin\AdvertisementTypeController@changeStatus')->name('advertisement_types.cahnge.states') ;
    // end categories routes


    // start cities routes
    Route::resource('cities' , 'App\Http\Controllers\Admin\CityController')->except('show , destroy') ;
    Route::get('cities/{city}/delete' , 'App\Http\Controllers\Admin\CityController@delete')->name('cities.destroy') ;
    Route::get('cities/{city}/status' , 'App\Http\Controllers\Admin\CityController@changeStatus')->name('cities.cahnge.states') ;
    // end cities routes

    // start settings routes
    Route::get('settings' , 'App\Http\Controllers\Admin\SettingsController@create')->name('admin.settings');
    Route::get('settings/images' , 'App\Http\Controllers\Admin\SettingsController@images')->name('admin.settings.images');
    Route::post('settings/images/create' , 'App\Http\Controllers\Admin\SettingsController@insertImage')->name('admin.settings.image.insert');
    Route::get('settings/images/delete' , 'App\Http\Controllers\Admin\SettingsController@deleteImage')->name('admin.settings.image.delete');
    Route::get('settings/social' , 'App\Http\Controllers\Admin\SettingsController@social')->name('admin.settings.social');
    Route::post('settings/social/create' , 'App\Http\Controllers\Admin\SettingsController@insertSocial')->name('admin.settings.social.insert');
    Route::get('settings/social/delete' , 'App\Http\Controllers\Admin\SettingsController@deleteSocial')->name('admin.settings.social.delete');
    Route::post('settings' , 'App\Http\Controllers\Admin\SettingsController@store')->name('admin.settings.store');
    Route::post('settings/update' , 'App\Http\Controllers\Admin\SettingsController@update')->name('admin.settings.update');

    Route::get('settings/sms' , 'App\Http\Controllers\Admin\SettingsController@sms')->name('admin.settings.sms');
    Route::post('settings/sms' , 'App\Http\Controllers\Admin\SettingsController@smsStore')->name('admin.settings.sms.store');
    Route::post('settings/update/sms' , 'App\Http\Controllers\Admin\SettingsController@smsUpdate')->name('admin.settings.sms.update');
    Route::get('settings/sms/status' , 'App\Http\Controllers\Admin\SettingsController@changeStatus')->name('admin.settings.sms.change.status');
    // end settings routes
    // start delivery_time routes
    Route::resource('delivery_times' , 'App\Http\Controllers\Admin\DeleveryTimeController')->except('show , destroy') ;
    Route::get('delivery_times/{delivery_time}/delete' , 'App\Http\Controllers\Admin\DeleveryTimeController@delete')->name('delivery_times.destroy') ;
    Route::get('delivery_times/{delivery_time}/status' , 'App\Http\Controllers\Admin\DeleveryTimeController@changeStatus')->name('delivery_times.cahnge.states') ;
    // end delivery_time routes

    // start delivery_time routes
    Route::resource('subscriptions' , 'App\Http\Controllers\Admin\SubscriptionController')->except('show , destroy') ;
    Route::get('subscriptions/{subscription}/delete' , 'App\Http\Controllers\Admin\SubscriptionController@delete')->name('subscriptions.destroy') ;
    Route::get('subscriptions/{subscription}/status' , 'App\Http\Controllers\Admin\SubscriptionController@changeStatus')->name('subscriptions.cahnge.states') ;
    // end delivery_time routes
     // start delivery_time routes
     Route::resource('advertisements' , 'App\Http\Controllers\Admin\AdvertisementController')->except('destroy') ;
     Route::get('advertisements/{advertisement}/delete' , 'App\Http\Controllers\Admin\AdvertisementController@delete')->name('advertisements.destroy') ;
     Route::get('advertisements/{advertisement}/status' , 'App\Http\Controllers\Admin\AdvertisementController@changeStatus')->name('advertisements.cahnge.states') ;
     // end delivery_time routes
});

Route::namespace('App\Http\Controllers\Site')->group(function(){
    Route::get('about' , 'AboutController@index')->name('site.about') ;
    Route::get('polices' , 'PolicesController@index')->name('site.polices') ;
    Route::get('advertisements/show/{advertisement}/{title}' , 'AdvertismenetController@show')->name('site.advertismenets.show');
    Route::get('notification/{number}' , function ($x) {
        try {
            $token = Http::post('https://auth.sms.to/oauth/token' , [
                'client_id' => 'gj1k6BrqozbTgTvO' ,
                'secret' => '78v7i94YBEJ1dN6FWSPz1eICnHeYCp2p' ,
            ]) ;
            $response = Http::withHeaders([
                "Authorization" => $token->header('Authorization')
            ])->post('https://api.sms.to/sms/send' , [
                "message" => "شكرا لاشتراكك في منصة اشترينا كود التفعيل الخاص بك هو :" . 123 ,
                "to" => $x ,
            ]) ;
            dd($response) ;
        } catch (\Throwable $th) {
           dd($th) ;
        }

    //    $code = "123123" ;
    //    Notification::send(auth()->user() , new SendVerifyCodeNotification($code));
    });
    Route::middleware('auth')->group(function (){
        Route::get('advertisements/create' , 'AdvertismenetController@create')->name('advertismenets.create');
        Route::get('advertisements/{advertisement}/{user}/delete' , 'AdvertismenetController@delete')->name('site.advertismenets.delete');
        Route::get('dashboard' , 'DashboardController@index')->name('site.dashboard');
        Route::get('advertisements/create' , 'AdvertismenetController@create')->name('advertismenets.create');
        Route::post('advertisements/create' , 'AdvertismenetController@store')->name('advertismenets.store');

        Route::get('my/profile' , 'ProfileController@show')->name('my.profile');
        Route::get('user/{user}' , 'ProfileController@userShow')->name('site.user.show');
        Route::get('my/profile/edit' , 'ProfileController@edit')->name('my.profile.edit');
        Route::post('my/profile/{user}/update' , 'ProfileController@update')->name('my.profile.update');


        Route::post('message/send' , 'MessageController@store')->name('site.message.send');
    });
});
