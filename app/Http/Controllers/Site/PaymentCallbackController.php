<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class PaymentCallbackController extends Controller{
    public function index (){
        dd(request()->session()->get('advertisement')) ;
    }
}
