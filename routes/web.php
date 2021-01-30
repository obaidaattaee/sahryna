<?php

use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\BaseAdminControllers;
use App\Http\Controllers\Auth\CodeVerificationController;
use App\Models\Advertisement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Http;
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

Auth::routes(['verify' => true]);

Route::prefix('admin')->middleware('auth' , 'role:super_admin' )->group(function(){
    Route::get('/' , [BaseAdminControllers::class , 'index'])->name('admin.index');
    // start user routes
    Route::resource('users' , 'App\Http\Controllers\Admin\UserCntroller') ;
    Route::get('users/{user}/change_status' ,"App\Http\Controllers\Admin\UserCntroller@changeStatus" )->name('users.change.status');
    Route::get('users/{user}/change_delete_status' ,"App\Http\Controllers\Admin\UserCntroller@changeDeleteStatus" )->name('users.change.delete.status');
    Route::get('users/users/inactive' ,"App\Http\Controllers\Admin\UserCntroller@inactiveUsers" )->name('users.inactive');
    Route::get('users/users/deleted' ,"App\Http\Controllers\Admin\UserCntroller@deletedUsers" )->name('users.deleted');
    Route::get('users/{user}/accept' ,"App\Http\Controllers\Admin\UserCntroller@acceptUser" )->name('users.accept');
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
    // start countries routes
    Route::resource('countries' , 'App\Http\Controllers\Admin\CountryController')->except('show , destroy') ;
    Route::get('countries/{country}/delete' , 'App\Http\Controllers\Admin\CountryController@delete')->name('countries.destroy') ;
    Route::get('countries/{country}/status' , 'App\Http\Controllers\Admin\CountryController@changeStatus')->name('countries.cahnge.states') ;
    // end cities routes

    // start settings routes
    Route::get('settings' , 'App\Http\Controllers\Admin\SettingsController@create')->name('admin.settings');
    Route::get('settings/images' , 'App\Http\Controllers\Admin\SettingsController@images')->name('admin.settings.images');
    Route::post('settings/images/create' , 'App\Http\Controllers\Admin\SettingsController@insertImage')->name('admin.settings.image.insert');
    Route::get('settings/images/delete' , 'App\Http\Controllers\Admin\SettingsController@deleteImage')->name('admin.settings.image.delete');
    Route::get('settings/social' , 'App\Http\Controllers\Admin\SettingsController@social')->name('admin.settings.social');
    Route::post('settings/social/create' , 'App\Http\Controllers\Admin\SettingsController@insertSocial')->name('admin.settings.social.insert');
    Route::get('settings/social/delete' , 'App\Http\Controllers\Admin\SettingsController@deleteSocial')->name('admin.settings.social.delete');
    Route::get('settings/buyer_subscriptions/change_status' , 'App\Http\Controllers\Admin\SettingsController@buyerSubscriptionStatus')->name('admin.settings.buyer.subscription.status');
    Route::get('settings/profile_verification/change_status' , 'App\Http\Controllers\Admin\SettingsController@ProfileVerificationSubscriptionStatus')->name('admin.settings.prfile.verificaton');
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
     Route::get('advertisements/buyers/data' , 'App\Http\Controllers\Admin\AdvertisementController@buyersAdvertisements')->name('advertisements.index.buyers') ;
     Route::get('inactive/advertisements' , 'App\Http\Controllers\Admin\AdvertisementController@inactiveAdvertisements')->name('advertisements.index.inactive') ;
     Route::get('active/advertisements' , 'App\Http\Controllers\Admin\AdvertisementController@activeAdvertisements')->name('advertisements.index.active') ;
     Route::get('success/advertisements' , 'App\Http\Controllers\Admin\AdvertisementController@successAdvertisements')->name('advertisements.index.success') ;
     Route::get('advertisements/{advertisement}/delete' , 'App\Http\Controllers\Admin\AdvertisementController@delete')->name('advertisements.destroy') ;
     Route::get('advertisements/{advertisement}/status' , 'App\Http\Controllers\Admin\AdvertisementController@changeStatus')->name('advertisements.cahnge.states') ;
     Route::get('advertisements/{advertisement}/accept' , 'App\Http\Controllers\Admin\AdvertisementController@accept')->name('advertisements.accept') ;
     // end delivery_time routes


     // start errors routes
    Route::get('errors' , 'App\Http\Controllers\Admin\ErrorsController@index')->name('admin.errors') ;

     // end errors routes
});

Route::namespace('App\Http\Controllers\Site')->middleware(['codeverirfication' , 'verified'])->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('main');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/buyers/advertisements', [App\Http\Controllers\HomeController::class, 'buyerAdvertisements'])->name('buyers.advertisements');
    Route::get('about' , 'AboutController@index')->name('site.about') ;
    Route::get('payment/callback' , 'PaymentCallbackController@index')->name('site.payment.callback') ;
    Route::get('polices' , 'PolicesController@index')->name('site.polices') ;
    Route::get('advertisements/show/{advertisement}/{title}' , 'AdvertismenetController@show')->name('site.advertismenets.show');
    Route::get('advertisements/buyer/show/{advertisement}/{title}' , 'BuyerAdvertisementController@buyerAdvertisementShow')->name('site.buyer.advertismenets.show');

    Route::middleware(['auth'])->group(function (){
        Route::get('advertisements/{advertisement}/{user}/delete' , 'AdvertismenetController@delete')->name('site.advertismenets.delete');
        Route::get('dashboard' , 'DashboardController@index')->name('site.dashboard');

        Route::post('message/send' , 'MessageController@store')->name('site.message.send');
        // start code verification routes
        Route::get('phone/verification' , [CodeVerificationController::class , 'codeVerifiy'])->name('code.verify') ;
        Route::post('phone/verification' , [CodeVerificationController::class , 'codeVerification'])->name('phone.verification') ;
        Route::get('phone/resend/code' , [CodeVerificationController::class , 'codeResend'])->name('code.resend') ;
        //end code verification routes

        //start profile routes
        Route::get('my/profile' , 'ProfileController@show')->name('my.profile');
        Route::get('user/{user}' , 'ProfileController@userShow')->name('site.user.show');
        Route::get('my/profile/edit' , 'ProfileController@edit')->name('my.profile.edit');
        Route::get('my/profile/edit_password' , 'ProfileController@editPassword')->name('my.profile.edit.password');
        Route::get('my/profile/show_contact/data' , 'ProfileController@ShowContactData')->name('my.profile.show.contact.data');
        Route::get('user/{user}/advertisements' , 'ProfileController@userAdvertisements')->name('user.advertisements');
        Route::post('my/profile/{user}/update' , 'ProfileController@update')->name('my.profile.update');
        Route::post('my/profile/{user}/update_password' , 'ProfileController@updatePassword')->name('my.profile.update.password');
        //end prodile routes
        Route::group(['middleware'=> 'profileverirfication'] , function(){
            Route::get('advertisements/create' , 'AdvertismenetController@create')->name('advertismenets.create');
            Route::get('advertisements/{advertisement}/edit' , [App\Http\Controllers\Admin\AdvertisementController::class, 'edit'])->name('advertismenets.edit');
            Route::post('advertisements/create' , 'AdvertismenetController@store')->name('advertismenets.store');
            Route::post('buyer/advertisements/create' , 'AdvertismenetController@buyerAdvertisementsStore')->name('buyer.advertismenets.store');
            Route::post('user/{user}/advertisements/{advertisement}/create/supscription' , 'AdvertismenetController@addSubscription')->name('advertismenets.add.subscription');
            Route::get('user/advertisements/{advertisement}/add/like' , 'AdvertismenetController@addLike')->name('advertismenets.add.like');
            Route::get('user/{user}/advertisements/{advertisement}/delete/{subscription}/supscription' , 'AdvertismenetController@deleteSubscription')->name('advertismenets.delete.subscription');


            Route::get('contribute/code/verify' , 'AdvertismenetController@contributeCode')->name('contribute.code');
            Route::post('contribute/code/verify' , 'AdvertismenetController@contributeCodeVerify')->name('contribute.code.verify');
            Route::post('contribute/complete/verify' , 'AdvertismenetController@contributeCompleteVerify')->name('contribute.complete.verify');
        });
    });

});

Route::get('test' , function (){
    return view('test') ;
});
