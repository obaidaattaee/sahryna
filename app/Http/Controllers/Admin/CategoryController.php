<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller{
    public function index () {
        $categories = Category::get();
        return view('admin.categories.index')
                    ->with('categories' , $categories) ;

    }
    public function create(){
        return view('admin.categories.create');
    }
    public function store(){
        request()['active'] = request()['active'] ? 1 : 0 ;
        request()['description'] = request()['description'] ?? " "  ;
        $data = request()->validate([
            'title' => 'required' ,
            'description' => 'required' ,
            'active' => 'required' ,
        ]);
        Category::create($data);
        session()->flash('msg' , 's: تم اضافة التصنيف بنجاح') ;
        return redirect(route('categories.index'));
    }
    public function edit(Category $category){
        return view('admin.categories.edit')
                    ->with('category' , $category) ;
    }
    public function changeStatus(Category $category){
        $category->active = !$category->active ;
        $category->save() ;
        if($category->active == 1){
            session()->flash('msg' , 's: تم تفعيل التصنيف بنجاح') ;
        }else{
            session()->flash('msg' , 's: تم الغاء تفعيل التصنيف ') ;
        }
        return redirect(route('categories.index'));
    }
    public function delete(Category $category){
        $category->delete() ;
        session()->flash('msg' , 's: تم  حذف التصنيف ') ;
        return redirect(route('categories.index'));
    }
    public function update(Category $category){

        request()['active'] = request()['active'] ? 1 : 0 ;
        request()['description'] = request()['description'] ?? " "  ;
        $data = request()->validate([
            'title' => 'required' ,
            'description' => 'required' ,
            'active' => 'required' ,
        ]);
        $category->update($data);
        session()->flash('msg' , 's: تم تعديل التصنيف بنجاح') ;
        return redirect(route('categories.index'));
    }

}
