<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\ApartmentCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApartmentCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $apartments = Apartment::pluck('id');
        return [
            'apartment_id' => $this->faker->unique()->randomElement($apartments),
            'title' => $this->faker->randomElement(['Luxury', 'Estándar', 'Premium']),
            'description' => $this->faker->paragraph,
        ];
    }
}
