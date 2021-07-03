<?php

namespace Database\Seeders;

use App\Models\ApartmentCategory;
use Illuminate\Database\Seeder;

class ApartmentCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApartmentCategory::factory()->count(20)->create();
    }
}
