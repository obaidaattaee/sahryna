<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::create([
            'first_name' => "super admin",
            'last_name' => "super admin",
            'phone' => '966123456789',
            'person_id' => "1234567890",
            'email' => "super_admin@mail.com",
            'password' => bcrypt('1234567890'),
        ]);
       
        $super_admin->attachRole('super_admin');
    }
}
