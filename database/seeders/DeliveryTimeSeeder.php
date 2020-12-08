<?php

namespace Database\Seeders;

use App\Models\DeliveryTime;
use Illuminate\Database\Seeder;

class DeliveryTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryTime::insert([
            [
                'time_day' => 2 ,
                'active' => 1,
            ],
            [
                'time_day' => 6 ,
                'active' => 1,
            ],
            [
                'time_day' => 10 ,
                'active' => 1,
            ],
           
        ]);
    }
}
