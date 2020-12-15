<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::insert([
            [
                'title' => 'مكة المكرمة' ,
                'active' => 1,
            ],
            [
                'title' => 'المدينة المنورة' ,
                'active' => 1,
            ],
            [
                'title' => 'الرياض' ,
                'active' => 1,
            ],
            [
                'title' => 'الطائف' ,
                'active' => 1,
            ],
            [
                'title' => 'الخبر' ,
                'active' => 1,
            ],
            [
                'title' => 'الاحساء' ,
                'active' => 1,
            ],
            [
                'title' => 'جدة' ,
                'active' => 1,
            ],
            [
                'title' => 'تبوك' ,
                'active' => 1,
            ],
        ]);
    }
}
