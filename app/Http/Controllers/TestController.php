<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use ZipArchive;

class TestController extends Controller{
    public function index (){

    }
    public function store()
    {
        /*
#parameters: array:2 [▼
      "paymentId" => "07071491908148414873"
      "Id" => "07071491908148414873"
    ]
*/
        $myfatoorah = new MyFatoorah ;
        $token = $myfatoorah->getToken() ;
        dd($token->getTo;
        $respons = Http::withHeaders([
            'Authorization' => ''
        ]);

    }
}
