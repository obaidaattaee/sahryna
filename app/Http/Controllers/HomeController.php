<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $advertisements = Advertisement::where('active' , 1)
                            ->where('end_publish_date' , '>' , Carbon::now())
                            ->with(['city'])
                            ->paginate(40);
        // dd($advertisements) ;
        return view('site.home')
                ->with('advertisements' , $advertisements);
    }
}
