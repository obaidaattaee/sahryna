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
            "alternative_phone" => "966123456789",
            'person_id' => "1234567890",
            'email' => "super_admin@mail.com",
            'person_image' => 'avatar.png',
            "signature_image" => null,
            "payment_data" => "eyJpdiI6Im5uTythUUUwNVM3b25GblhGR1BKS1E9PSIsInZhbHVlIjoiVXp2Q2F3d0RjdlZvKzUzdXBXUm11OVdKZ2JnQ1VyTkRLRGRnMVFTYkpXZGxlMHg3emhkRFI3VmM3cXFkV1ljSHdXMERqVTFiOXgxeFFISitvNDFGeHoyWTV3L3c4THNJUlg1T0FDNllaejAraFBvUE1lWjNQSzBtRFZPNnVQd3IxSVpZOHVRbmkxcm5zUVVCaGxSbG1nOHlFRE1teFNQaGNad0Nla0Y1R1JoZVlVUkhHNk1RMDdORnphK3puazJlUU1YbHU0RTc3VHBITXJ6NHEwL1hHc05ucFQwUStCMDRoVE9KQ1Z5N2M3eGk5NitIdHVPTlM2YWgxejZ1N0wvciIsIm1hYyI6IjJjMzA2NjRmYzUxYWQ5YzNlNjYyZjhiMDM5N2U4ZTUxZGI5YmYxNmRkMWMwYWEzNGFlNzc5Mjg3ZWI2NTA3YmQifQ==",
            'password' => bcrypt('1234567890'),
        ]);
        $obaida = User::create([
            'first_name' => "obaida",
            'last_name' => "obaida",
            'phone' => '966123457789',
            "alternative_phone" => "966123457789",
            'person_id' => "12333367890",
            'email' => "obaida@mail.com",
            'person_image' => 'avatar.png',
            "signature_image" => null,
            "payment_data" => "eyJpdiI6Im5uTythUUUwNVM3b25GblhGR1BKS1E9PSIsInZhbHVlIjoiVXp2Q2F3d0RjdlZvKzUzdXBXUm11OVdKZ2JnQ1VyTkRLRGRnMVFTYkpXZGxlMHg3emhkRFI3VmM3cXFkV1ljSHdXMERqVTFiOXgxeFFISitvNDFGeHoyWTV3L3c4THNJUlg1T0FDNllaejAraFBvUE1lWjNQSzBtRFZPNnVQd3IxSVpZOHVRbmkxcm5zUVVCaGxSbG1nOHlFRE1teFNQaGNad0Nla0Y1R1JoZVlVUkhHNk1RMDdORnphK3puazJlUU1YbHU0RTc3VHBITXJ6NHEwL1hHc05ucFQwUStCMDRoVE9KQ1Z5N2M3eGk5NitIdHVPTlM2YWgxejZ1N0wvciIsIm1hYyI6IjJjMzA2NjRmYzUxYWQ5YzNlNjYyZjhiMDM5N2U4ZTUxZGI5YmYxNmRkMWMwYWEzNGFlNzc5Mjg3ZWI2NTA3YmQifQ==",
            'password' => bcrypt('1234567890'),
        ]);
        $obaida->attachRole('user');
        $super_admin->attachRole('super_admin');
    }
}
