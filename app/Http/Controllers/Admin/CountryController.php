<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryController extends Controller{
    public function index () {
        $countries = Country::get();
        return view('admin.countries.index')
                    ->with('countries' , $countries) ;

    }
    public function create(){
        return view('admin.countries.create');
    }
    public function store(){
        request()['active'] = request()['active'] ? 1 : 0 ;
        $data = request()->validate([
            'title' => 'required' ,
            'active' => 'required' ,
        ]);
        Country::create($data);
        session()->flash('msg' , 's: تم اضافة الدولة  بنجاح') ;
        return redirect(route('countries.index'));
    }
    public function edit(Country $country){
        return view('admin.countries.edit')
                    ->with('country' , $country) ;
    }
    public function changeStatus(Country $country){
        $country->active = !$country->active ;
        $country->save() ;
        if($country->active == 1){
            session()->flash('msg' , 's: تم تفعيل الدولة بنجاح') ;
        }else{
            session()->flash('msg' , 's: تم الغاء تفعيل الدولة ') ;
        }
        return redirect(route('countries.index'));
    }
    public function delete(Country $country){
        $country->delete() ;
        session()->flash('msg' , 's: تم  حذف الدولة ') ;
        return redirect(route('countries.index'));
    }
    public function update(Country $country){

        request()['active'] = request()['active'] ? 1 : 0 ;
        $data = request()->validate([
            'title' => 'required' ,
            'active' => 'required' ,
        ]);
        $country->update($data);
        session()->flash('msg' , 's: تم تعديل الدولة بنجاح') ;
        return redirect(route('countries.index'));
    }

}
