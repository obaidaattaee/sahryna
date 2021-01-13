<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class BuyerAdvertisementController extends Controller{
    public function index(){

    }

    public function create(){
         
        return view('site.buyer_advertisements.create');
    }
}
