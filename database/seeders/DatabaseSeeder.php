<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeed::class);
        $this->call(AdminSeed::class);
        \App\Models\User::factory(100)->create()->each( function ($user)  {
            $user->syncRoles(['user']);
        });
        Category::factory(10)->create() ;
        $this->call(CitySeeder::class) ;
        $this->call(AdvertisementType::class) ;
        $this->call(DeliveryTimeSeeder::class) ;
        $this->call(SubscriptionSeeder::class) ;
        $this->call(AdvertisementSee::class) ;
        $this->call(SettingsSeeder::class) ;

    }
}
