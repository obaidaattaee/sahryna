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
        // $token = $myfatoorah->getToken() ;
        // $apiKey = 'Bearer'.' '. explode(' ' ,$token->getData()->token)[1];
        // dd($token->getData()->token, $token_string);
        // $respons = Http::withToken($token_string)->post('https://api.myfatoorah.com/v2/getPaymentStatus' , [
        //     'KeyType' => 'paymentId',
        //     'Key'     => "07071491908148414873",
        // ]);
        // $apiKey = ''; //Live token value to be placed here: https://myfatoorah.readme.io/docs/live-token
        $s = $myfatoorah->callback();
        dd($s);
    }
}
