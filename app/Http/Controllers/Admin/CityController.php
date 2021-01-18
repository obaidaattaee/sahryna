<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;

class CityController extends Controller{
    public function index () {
        $cities = City::get();
        return view('admin.cities.index')
                    ->with('cities' , $cities) ;

    }
    public function create(){
        $countries = Country::get();
        return view('admin.cities.create')
                ->with('countries' , $countries);
    }
    public function store(){
        request()['active'] = request()['active'] ? 1 : 0 ;
        $data = request()->validate([
            'title' => 'required' ,
            'active' => 'required' ,
            'country_id' => ['required' , 'exists:countries,id'] ,
        ]);
        City::create($data);
        session()->flash('msg' , 's: تم اضافة المدينة بنجاح') ;
        return redirect(route('cities.index'));
    }
    public function edit(City $city){
        $countries = Country::get();
        return view('admin.cities.edit')
                    ->with('countries' , $countries)
                    ->with('city' , $city) ;
    }
    public function changeStatus(City $city){
        $city->active = !$city->active ;
        $city->save() ;
        if($city->active == 1){
            session()->flash('msg' , 's: تم تفعيل المدينة بنجاح') ;
        }else{
            session()->flash('msg' , 's: تم الغاء تفعيل المدينة ') ;
        }
        return redirect(route('cities.index'));
    }
    public function delete(City $city){
        $city->delete() ;
        session()->flash('msg' , 's: تم  حذف المدينة ') ;
        return redirect(route('cities.index'));
    }
    public function update(City $city){

        request()['active'] = request()['active'] ? 1 : 0 ;
        $data = request()->validate([
            'title' => 'required' ,
            'country_id' => 'required' ,
            'active' => 'required' ,
        ]);
        $city->update($data);
        session()->flash('msg' , 's: تم تعديل المدينة بنجاح') ;
        return redirect(route('cities.index'));
    }

}
