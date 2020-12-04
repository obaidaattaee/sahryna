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
    return view('welcome');
});
Route::get('crypt' , function(){
    dd( Crypt::encrypt('obaida') ) ;
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth' , 'role:super_admin')->group(function(){
    Route::get('/' , [BaseAdminControllers::class , 'index'])->name('admin.index');
    // start user routes
    Route::resource('users' , 'App\Http\Controllers\Admin\UserCntroller') ;
    Route::get('users/{user}/change_status' ,"App\Http\Controllers\Admin\UserCntroller@changeStatus" )->name('users.change.status');
    Route::get('users/{user}/change_delete_status' ,"App\Http\Controllers\Admin\UserCntroller@changeDeleteStatus" )->name('users.change.delete.status');
    Route::get('users/users/inactive' ,"App\Http\Controllers\Admin\UserCntroller@inactiveUsers" )->name('users.inactive');
    // end user routes

    // start roles routes
    Route::resource('roles' , 'App\Http\Controllers\Admin\RoleController')->except('show , destroy') ;
    Route::get('roles/{role}/delete' , 'App\Http\Controllers\Admin\RoleController@delete')->name('roles.destroy') ;
    // end roles routes

});
