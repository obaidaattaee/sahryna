<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;

class AdvertisementController extends Controller{
    public function index (){
        $advertisements = Advertisement::with('user')->get();
        // return $advertisements ;
        return view('admin.advertisements.index')
                ->with('advertisements' , $advertisements) ;
    }
}
