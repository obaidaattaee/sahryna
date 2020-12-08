<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class AdvertismenetController extends Controller{
    public function create(){
        return view('site.advertisements.create');
    }
}
