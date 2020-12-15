<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subscription::insert([
            [
                'title' => '  يوم واحد' ,
                'description' => 'اعلان لمدة يوم واحد  ' ,
                'price' => 0 ,
                'time_day' => 1 ,
                'active' => 1 ,
            ],
            [
                'title' => '  يومين ' ,
                'description' => 'اعلان لمدة يومين   ' ,
                'price' => 2 ,
                'time_day' => 2 ,
                'active' => 1 ,
            ],
            [
                'title' => ' ثلاثة ايام ' ,
                'description' => 'اعلان لمدة  ثلاثة ايام  ' ,
                'price' => 3 ,
                'time_day' => 3 ,
                'active' => 1 ,
            ],
        ]);
    }
}
