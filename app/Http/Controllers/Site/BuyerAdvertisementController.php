<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\BuyerAdvertisement;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class BuyerAdvertisementController extends Controller{
    public function index(){

    }

    public function create(){
        return view('site.buyer_advertisements.create');
    }
    public function buyerAdvertisementShow(BuyerAdvertisement $advertisement){
        if(!$advertisement->end_publish_date >= Carbon::now() || !$advertisement->active){
            Alert::warning('هذا الاعلان تم ايقافه');
        }
        // dd($advertisement) ;
        return view('site.buyer_advertisements.show_buyer_advertisement')->with('advertisement' ,$advertisement ) ;
    }
}
