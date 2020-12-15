<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class UserCntroller extends Controller{
    function index (){
        $users = User::with('roles')
                    ->with('roles:role_user.user_id')
                    ->with('roles:role_user.role_id')
                    ->with('roles:role_user.user_type')
                    ->where('active' , 1)

                    ->get() ;

        return view('admin.users.index')
                    ->with('users' , $users);
    }
    function edit (User $user){
        $roles = Role::get();
        return view('admin.users.edit-user')
            ->with('user' , $user)
            ->with('roles' , $roles);
    }
    public function show (User $user){
        return view('admin.users.show')
                    ->with('user' , $user) ;
    }
    public function changeStatus(User $user){
        $status = !$user->active ;
        $user->update([
            'active' => $status
        ]);
        if($status == 1){
            session()->flash('msg' , 's: تم تفعيل عضوية '.$user->first_name . " " . $user->last_name);
        }
        else{
            session()->flash('msg' , 's: تم الغات تفعيل عضوية '.$user->first_name . " " . $user->last_name);

        }
        return redirect(route('users.index'));
    }
    public function changeDeleteStatus(User $user){
        $status = $user->deleted_at == null ? 1 : 0  ;
        if($status == 1){
            $user->update([
                'deleted_at' => new DateTime('now') ,
                'active' => 0 ,
            ]);
            session()->flash('msg' , 's: تم حذف عضوية '.$user->first_name . " " . $user->last_name);
            return redirect(route('users.inactive'));
        }
        else{
            $user->update([
                'deleted_at' => null ,
                'active' => 1 ,
            ]);
            session()->flash('msg' , 's: تم استرجاع عضوية '.$user->first_name . " " . $user->last_name);
            return redirect(route('users.index'));
        }
    }
    public function inactiveUsers(){
        $users = User::with('roles')
                    ->with('roles:role_user.user_id')
                    ->with('roles:role_user.role_id')
                    ->with('roles:role_user.user_type')
                    ->where('active' , 0)
                    ->get() ;

        return view('admin.users.inactive')
                    ->with('users' , $users);
    }
    public function deletedUsers(){
        $users = User::onlyTrashed()->get();
        return view('admin.users.inactive')
                    ->with('users' , $users);
    }
    public function update(User $user){
        $data =  request()->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/(966)[0-9]{7}/', 'max:255' , 'unique:users,phone,'.$user->id.',id'],
            'alternative_phone' => ['required', 'regex:/(966)[0-9]{7}/', 'max:255' , 'unique:users,alternative_phone,'.$user->id.',id'],
            'person_id' => ['required', 'regex:/[0-9]{9}/', 'max:255' , 'unique:users,person_id,'.$user->id.',id'],
        ]);
        if ((request()->file) != null) {
            $data['person_image'] = basename(request()->file->store('public' , 'public'));
        }
        else {
            $data['person_image'] = $user->person_image ;
        }
        if ((request()->signature_image_file) != null) {
            $data['signature_image'] = basename(request()->signature_image_file->store('public' , 'public'));
        }else {
            $data['signature_image'] = $user->signature_image ;
        }
        $user->update($data) ;
        if(isset(request()->roles))
            $user->syncRoles(request()->roles);
        session()->flash('msg' , 's: تم تحديث بيانات العضو  '.$user->first_name . " " . $user->last_name . 'بنجاح');
        return redirect(route('users.index'));
    }
    public function create(){
        $roles = Role::get();
        return view('admin.users.create')
                ->with('roles' , $roles);
    }


    public function store(){
        $data =  request()->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email' , 'unique:users'],
            'phone' => ['required', 'regex:/(966)[0-9]{7}/', 'max:255' , 'unique:users'],
            'alternative_phone' => ['required', 'regex:/(966)[0-9]{7}/', 'max:255' , 'unique:users'],
            'person_id' => ['required', 'regex:/[0-9]{9}/', 'max:255' , 'unique:users'],
            'password' => ['min:8', 'confirmed'],
        ]);
        if ((request()->file) != null) {
            $data['person_image'] = basename(request()->file->store('public' , 'public'));
        }
        else {
            $data['person_image'] = null ;
        }
        if ((request()->signature_image_file) != null) {
            $data['signature_image'] = basename(request()->signature_image_file->store('public' , 'public'));
        }else {
            $data['signature_image'] = null ;
        }
        $user = User::create($data) ;
        if(isset(request()->roles))
            $user->syncRoles(request()->roles);
        session()->flash('msg' , 's: تم  اضافة العضو  '.$user->first_name . " " . $user->last_name . 'بنجاح');
        return redirect(route('users.index'));
    }
}
