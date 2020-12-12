<?php

use App\Http\Controllers\Admin\BaseAdminControllers;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Crypt;
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
    return view('site.home');

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
});

Route::namespace('App\Http\Controllers\Site')->group(function(){
    Route::get('my/profile' , 'ProfileController@show')->name('my.profile');
    Route::get('my/profile/edit' , 'ProfileController@edit')->name('my.profile.edit');
    Route::post('my/profile/{user}/update' , 'ProfileController@update')->name('my.profile.update');
    
    Route::middleware('auth')->group(function (){
        Route::get('advertisements/create' , 'AdvertismenetController@create')->name('advertismenets.create');
        Route::post('advertisements/create' , 'AdvertismenetController@store')->name('advertismenets.store');
    });
});
