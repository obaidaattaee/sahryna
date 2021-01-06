<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Role;
use App\Models\Subscription;

class SubscriptionController extends Controller{
    public function index () {
        $subscriptions = Subscription::with('role')->get();
        return view('admin.subscriptions.index')
                    ->with('subscriptions' , $subscriptions) ;

    }
    public function create(){
        $roles = Role::get()->except(1) ;
        return view('admin.subscriptions.create')
                    ->with('roles' , $roles);
    }
    public function store(){
        request()['active'] = request()['active'] ? 1 : 0 ;
        request()['description'] = request()['description'] ?? " " ;
        request()['price'] = request()['price'] ?? 0 ;
        $data = request()->validate([
            'title' => 'required' ,
            'description' => 'required' ,
            'price' => ['required' , 'integer'] ,
            'time_day' => 'required' ,
            'active' => 'required' ,
            'role_id' => ['required' , 'exists:roles,id'] ,
        ]);
        Subscription::create($data);
        session()->flash('msg' , 's: تم اضافة الاشتراك بنجاح') ;
        return redirect(route('subscriptions.index'));
    }
    public function edit(Subscription $subscription){
        $roles = Role::get()->except(1) ;
        return view('admin.subscriptions.edit')
                    ->with('subscription' , $subscription)
                    ->with('roles' , $roles) ;
    }
    public function changeStatus(Subscription $subscription){
        $subscription->active = !$subscription->active ;
        $subscription->save() ;
        if($subscription->active == 1){
            session()->flash('msg' , 's: تم تفعيل الاشتراك بنجاح') ;
        }else{
            session()->flash('msg' , 's: تم الغاء تفعيل الاشتراك ') ;
        }
        return redirect(route('subscriptions.index'));
    }
    public function delete(Subscription $subscription){
        $subscription->delete() ;
        session()->flash('msg' , 's: تم  حذف الاشتراك ') ;
        return redirect(route('subscriptions.index'));
    }
    public function update(Subscription $subscription){
        request()['active'] = request()['active'] ? 1 : 0 ;
        request()['description'] = request()['description'] ?? " " ;
        $data = request()->validate([
            'title' => 'required' ,
            'description' => 'required' ,
            'price' => ['required' , 'integer'] ,
            'time_day' => 'required' ,
            'active' => 'required' ,
            'role_id' => ['required' , 'exists:roles,id'] ,
        ]);
        $subscription->update($data);
        session()->flash('msg' , 's: تم تعديل الاشتراك بنجاح') ;
        return redirect(route('subscriptions.index'));
    }

}
