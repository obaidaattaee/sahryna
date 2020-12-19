<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\AdvertisementType;
use App\Models\Category;
use App\Models\City;
use App\Models\DeliveryTime;
use App\Models\Subscription;
use RealRashid\SweetAlert\Facades\Alert;

class AdvertisementController extends Controller{
    public function index (){
        $advertisements = Advertisement::with('user')->get();
        // return $advertisements ;
        return view('admin.advertisements.index')
                ->with('advertisements' , $advertisements) ;
    }
    public function changeStatus(Advertisement $advertisement){
        $advertisement->update([
            'active' => !$advertisement->active
        ]) ;
        session()->flash('msg' , 's: تم تعديل حالة الاعلان بنجاح');
        return redirect(route('advertisements.index'));
    }
    public function show (Advertisement $advertisement){
        return redirect(route('site.advertismenets.show' , [
            'advertisement' => $advertisement->id ,
            'title' => $advertisement->title
        ]));
    }
    public function delete(Advertisement $advertisement){
        $advertisement->delete() ;
        session()->flash('msg' , 'w: تم  حذف الاعلان ');
        return redirect(route('advertisements.index'));
    }
}
