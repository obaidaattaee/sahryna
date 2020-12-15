<?php

namespace Database\Seeders;

use App\Models\AdvertisementType as ModelsAdvertisementType;
use Illuminate\Database\Seeder;

class AdvertisementType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsAdvertisementType::insert([
            [
                'title' => "عروض موسمية" ,
                'description' => "عروض موسمية" ,
                'active' => 1 ,
            ],
            [
                'title' => "عروض يومية" ,
                'description' => "عروض يومية" ,
                'active' => 1 ,
            ],
            [
                'title' => "عروض " ,
                'description' => "عروض " ,
                'active' => 1 ,
            ],
            [
                'title' => "طلبات " ,
                'description' => "طلبات" ,
                'active' => 1 ,
            ],
        ]);
    }
}
