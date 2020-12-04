<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;

class RoleController extends Controller{
    public function index(){
        $roles= Role::with('permissions')->get();
        return view('admin.roles.index')->with('roles' , $roles );
    }
    public function edit(Role $role){
        $permissions = Permission::get() ;
        return view('admin.roles.edit')
            ->with('role' , $role)
            ->with('permissions' , $permissions);
    }
    public function update(Role $role){
        $role_data = request()->validate([
            'display_name' => ['required'] ,
            'description' => ['required'] ,
        ]);
        request()->except('name');
        $role->update($role_data) ;
        // dd(request()->permission);
        if(isset(request()->permission)){
            $role->syncPermissions(request()->permission) ;
        }

        session()->flash('msg' , 's: تم تحديث الصلاحية بنجاح');
        return redirect(route('roles.index'));
    }
    public function delete(Role $role){
        $role->delete() ;
        session()->flash('msg' , 's: تم حذف الصلاحية ');
        return redirect(route('roles.index'));
    }
    public function create(){
        $permissions = Permission::get() ;
        return view('admin.roles.create')
                    ->with('permissions' , $permissions);
    }
    public function store(){
        $role_data = request()->validate([
            'name' => ['required'] ,
            'display_name' => ['required'] ,
            'description' => ['required'] ,
        ]);
       $role = Role::create($role_data);

       if(isset(request()->permission)){
            $role->syncPermissions(request()->permission) ;
        }

        session()->flash('msg' , 's: تم اضافه الصلاحية بنجاح');
        return redirect(route('roles.index'));
    }
}
