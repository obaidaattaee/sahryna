<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BaseAdminControllers extends Controller{
    function index(){
        return view('admin.home');
    }
}
