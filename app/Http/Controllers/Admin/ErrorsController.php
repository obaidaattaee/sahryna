<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Errors;

class ErrorsController extends Controller{
    public function index () {
        $errors_messages = Errors::get() ;
        // dd($errors_messages);
        return view('admin.errors.index')
                ->with('errors_messages' , $errors_messages) ;
    }
}
