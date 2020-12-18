<?php

namespace Database\Seeders;

use App\Models\SmsSettings;
use Illuminate\Database\Seeder;

class SmsSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SmsSettings::create([
            'user_name' => "gj1k6BrqozbTgTvO" ,
            'password' => "78v7i94YBEJ1dN6FWSPz1eICnHeYCp2p" ,
            'message' => "شكرا لاشتراكك في منصة اشترينا , كود لتفعيل الخاص بك هو :" ,
            'active' => 1 ,
        ]) ;
    }
}
