<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryTime;

class DeleveryTimeController extends Controller{
    public function index () {
        $times = DeliveryTime::get();
        return view('admin.deliverytime.index')
                    ->with('times' , $times) ;

    }
    public function create(){
        return view('admin.deliverytime.create');
    }
    public function store(){
        request()['active'] = request()['active'] ? 1 : 0 ;
        $data = request()->validate([
            'time_day' => ['required' , 'integer'],
            'active' => 'required' ,
        ]);
        DeliveryTime::create($data);
        session()->flash('msg' , 's: تم اضافة مدة التوصيل بنجاح') ;
        return redirect(route('delivery_times.index'));
    }
    public function edit(DeliveryTime $delivery_time){
        return view('admin.deliverytime.edit')
                    ->with('time' , $delivery_time) ;
    }
    public function changeStatus(DeliveryTime $delivery_time){
        $delivery_time->active = !$delivery_time->active ;
        $delivery_time->save() ;
        if($delivery_time->active == 1){
            session()->flash('msg' , 's: تم تفعيل مدة التوصيل بنجاح') ;
        }else{
            session()->flash('msg' , 'w: تم الغاء تفعيل مدة التوصيل ') ;
        }
        return redirect(route('delivery_times.index'));
    }
    public function delete(DeliveryTime $delivery_time){
        $delivery_time->delete() ;
        session()->flash('msg' , 'w: تم  حذف مدة التوصيل ') ;
        return redirect(route('delivery_times.index'));
    }
    public function update(DeliveryTime $delivery_time){

        request()['active'] = request()['active'] ? 1 : 0 ;
        $data = request()->validate([
            'time_day' => 'required' ,
            'active' => 'required' ,
        ]);
        $delivery_time->update($data);
        session()->flash('msg' , 's: تم تعديل مدة التوصيل بنجاح') ;
        return redirect(route('delivery_times.index'));
    }

}
