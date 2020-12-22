<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MyFatoorah;
use App\Models\Advertisement;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentCallbackController extends Controller{
    public function index (){
        $myfatoora = new MyFatoorah;
        $myfatoora->callback();
        dd($myfatoora);
        $advertisement = Advertisement::findOrfail(request()->session()->get('advertisement')['advertisement_id']);
        $advertisement->active = 1 ;
        $advertisement->verified = 1 ;
        $advertisement->save();
        Alert::alert('تم اضافة اعلانك بنجاح') ;
        return redirect(route('main'));
   }

}



