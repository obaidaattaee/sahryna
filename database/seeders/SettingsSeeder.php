<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::insert([
            "title" => "موقع اشترينا" ,
            "description" => " .موقع يهدف الى إتاحة خيار الشراكة في شراء سلع بالجملة ثم تفريقها بين الشركاء" ,
            "domain" => "Aishtarayna.com" ,
            "wellcom_message" => "اهلا بكم في موقع اشترينا" ,
            "logo_image" => 'اشترينا001.jpg' ,
        ]) ;
    }
}
