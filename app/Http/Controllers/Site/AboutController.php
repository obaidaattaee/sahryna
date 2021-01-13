<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Settings;

class AboutController extends Controller{
    public function index() {
        $settings = Settings::select([
            'idea' , 'goals'
        ])->first();

        return view('site.about')
                ->with('settings' , $settings) ;
    }
}
