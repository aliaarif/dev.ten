<?php

use Illuminate\Database\Seeder;
use App\VendorType;

class VendorTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VendorType::truncate();
        VendorType::create(['name' => 'photographer']);
        VendorType::create(['name' => 'videographer']);
        VendorType::create(['name' => 'dj']);
        VendorType::create(['name' => 'photo-video-stand']);
        VendorType::create(['name' => 'performers']);
        VendorType::create(['name' => 'workshop-private-course']);
        VendorType::create(['name' => 'equipment-rental']);
        VendorType::create(['name' => 'ephemeral-stand-show']);
        VendorType::create(['name' => 'company-animation']);
        VendorType::create(['name' => 'excursions']);
        VendorType::create(['name' => 'booth-culinary-show']);
    }
}
