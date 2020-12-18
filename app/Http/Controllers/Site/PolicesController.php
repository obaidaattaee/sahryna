<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Settings;

class PolicesController extends Controller{
    public function index () {
        $settings = Settings::select([
            'polices'
        ])->first();

        return view('site.polices')
                ->with('settings' , $settings) ;
    }
}
