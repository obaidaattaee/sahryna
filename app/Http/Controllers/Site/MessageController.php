<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Message;
use RealRashid\SweetAlert\Facades\Alert;

class MessageController extends Controller{
    public function store(){
        $data = request()->validate([
            'to' => ['required' ] ,
            'title' => ['required' , 'string' ] ,
            'message' => ['required' , 'string' ] ,
        ] , [] , [
            'message' => 'محتوى الرساله'
        ]);
        $data['from'] = auth()->id() ;
        Message::create($data) ;
        Alert::success('تم ارسال رسالتك بنجاح') ;
        return redirect()->route('site.dashboard') ;
    }
}
