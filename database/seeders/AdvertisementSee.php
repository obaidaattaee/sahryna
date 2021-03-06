<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Seeder;

class AdvertisementSee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0 ; $i <= 10 ; $i++) {
        Advertisement::insert([
            [
                "title" => "Doobaida personally believe that your working environment is ..."  ,
                "description" => "sasssssssssss",
                "category_id" => "7",
                "city_id" => "2",
                "country_id" => "2",
                "phone" => "9661234543223",
                "cost" => "32",
                "number_of_partners" => "2",
                "retail_price" => "32",
                "wholesale_price" => "23",
                "subscription_id" => "1",
                "address" => "مفرق مبوعيم، إسراءيل" ,
                "delivery_time_id" => "2",
                "advertisement_type_id" => "2",
                "type_of_price" => "retail",
                "publish_date" => "2020-12-27",
                "lat" => "31.445109381683537",
                "long" => "34.65399056091817",
                "images" => '["XgWYAiQPXlRhpeYXMGfZlChEfmFBmXXiMcpLfJjv.jpg"]'  ,
                "user_id" => 1 ,
                "end_publish_date" => "2021-01-30",
                "active" => 1,
                "verified" => 1,
            ],[
                "title" => "Doobaida personally believe that your working environment is ..."  ,
                "description" => "sasssssssssss",
                "category_id" => "7",
                "city_id" => "5",
                "country_id" => "2",
                "phone" => "9661234543223",
                "cost" => "32",
                "number_of_partners" => "2",
                "retail_price" => "32",
                "wholesale_price" => "23",
                "subscription_id" => "1",
                "address" => "مفرق مبوعيم، إسراءيل" ,
                "delivery_time_id" => "2",
                "advertisement_type_id" => "2",
                "type_of_price" => "retail",
                "publish_date" => "2020-12-27",
                "lat" => "31.445109381683537",
                "long" => "34.65399056091817",
                "images" => '["XgWYAiQPXlRhpeYXMGfZlChEfmFBmXXiMcpLfJjv.jpg"]'  ,
                "user_id" => 1 ,
                "end_publish_date" => "2021-12-20",
                "active" => 0,
                "verified" => 0,
            ],[
                "title" => "Doobaida personally believe that your working environment is ..."  ,
                "description" => "sasssssssssss",
                "category_id" => "7",
                "city_id" => "4",
                "country_id" => "2",
                "phone" => "9661234543223",
                "cost" => "32",
                "number_of_partners" => "2",
                "retail_price" => "32",
                "wholesale_price" => "23",
                "subscription_id" => "1",
                "address" => "مفرق مبوعيم، إسراءيل" ,
                "delivery_time_id" => "2",
                "advertisement_type_id" => "2",
                "type_of_price" => "retail",
                "publish_date" => "2020-12-27",
                "lat" => "31.445109381683537",
                "long" => "34.65399056091817",
                "images" => '["XgWYAiQPXlRhpeYXMGfZlChEfmFBmXXiMcpLfJjv.jpg"]'  ,
                "user_id" => 1 ,
                "end_publish_date" => "2021-01-03",
                "active" => 1,
                "verified" => 0,
            ],[
                "title" => "Doobaida personally believe that your working environment is ..."  ,
                "description" => "sasssssssssss",
                "category_id" => "7",
                "city_id" => "2",
                "country_id" => "2",
                "phone" => "9661234543223",
                "cost" => "32",
                "number_of_partners" => "2",
                "retail_price" => "32",
                "wholesale_price" => "23",
                "subscription_id" => "1",
                "address" => "مفرق مبوعيم، إسراءيل" ,
                "delivery_time_id" => "2",
                "advertisement_type_id" => "2",
                "type_of_price" => "retail",
                "publish_date" => "2020-12-19",
                "lat" => "31.445109381683537",
                "long" => "34.65399056091817",
                "images" => '["XgWYAiQPXlRhpeYXMGfZlChEfmFBmXXiMcpLfJjv.jpg"]'  ,
                "user_id" => 2 ,
                "end_publish_date" =>  "2021-05-30",
                "active" => 1,
                "verified" => 1,
            ],
        ]);
    }
    $this->command->getOutput()->writeln("<comment>Seeding:</comment> adsads");


}

}
