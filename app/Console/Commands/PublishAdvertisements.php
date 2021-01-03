<?php

namespace App\Console\Commands;

use App\Models\Advertisement;
use App\Models\Errors;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PublishAdvertisements extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advertisements:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command to publish new advertisements';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = Advertisement::where('active' , 0)->where('verified' , 1)->whereDate('publish_date'  , Carbon::today())->update([
            'active' => 1
        ]);
        $count_end = Advertisement::where('active' , 1)->whereDate('end_publish_date'  , Carbon::today())->update([
            'active' => 0 ,
            'verified' => 0
        ]);
        Errors::insert([
            ['message' => "تم نفعيل  $count اعلانا اليوم و تم ايقاف  $count_end" . " " . Carbon::now()] ,
        ]) ;

        echo "ok\n";
    }
}
