<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdvertisementType;
use App\Models\Category;

class AdvertisementTypeController extends Controller{
    public function index () {
        $advertisement_types = AdvertisementType::get();
        return view('admin.advertisement_types.index')
                    ->with('advertisement_types' , $advertisement_types) ;

    }
    public function create(){
        return view('admin.advertisement_types.create');
    }
    public function store(){
        request()['active'] = request()['active'] ? 1 : 0 ;
        request()['description'] = request()['description'] ?? " "  ;
        $data = request()->validate([
            'title' => 'required' ,
            'description' => 'required' ,
            'active' => 'required' ,
        ]);
        AdvertisementType::create($data);
        session()->flash('msg' , 's: تم اضافة نوع المنتج بنجاح') ;
        return redirect(route('advertisement_types.index'));
    }
    public function edit(AdvertisementType $advertisement_type){
        return view('admin.advertisement_types.edit')
                    ->with('advertisement_type' , $advertisement_type) ;
    }
    public function changeStatus(AdvertisementType $advertisement_type){
        $advertisement_type->active = !$advertisement_type->active ;
        $advertisement_type->save() ;
        if($advertisement_type->active == 1){
            session()->flash('msg' , 's: تم تفعيل نوع المنتج بنجاح') ;
        }else{
            session()->flash('msg' , 's: تم الغاء تفعيل نوع المنتج ') ;
        }
        return redirect(route('advertisement_types.index'));
    }
    public function delete(AdvertisementType $advertisement_type){
        $advertisement_type->delete() ;
        session()->flash('msg' , 's: تم  حذف نوع المنتج ') ;
        return redirect(route('advertisement_types.index'));
    }
    public function update(AdvertisementType $advertisement_type){

        request()['active'] = request()['active'] ? 1 : 0 ;
        request()['description'] = request()['description'] ?? " "  ;
        $data = request()->validate([
            'title' => 'required' ,
            'description' => 'required' ,
            'active' => 'required' ,
        ]);
        $advertisement_type->update($data);
        session()->flash('msg' , 's: تم تعديل نوع المنتج بنجاح') ;
        return redirect(route('advertisement_types.index'));
    }

}
