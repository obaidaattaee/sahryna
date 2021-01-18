<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $json = File::get('database/DataFiles/country.json');
        $data = json_decode($json);
        foreach($data as $data){
            Country::create(
                [
                    'title' => $data->title ,
                ]
            );
        }
       $json = File::get('database/DataFiles/area.json');
        $data = json_decode($json);
        foreach($data as $data){
            City::create([
                'title' => $data->title ,
                'country_id' => $data->country_id,
            ]);
        }
    }
}
