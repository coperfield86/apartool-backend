<?php

namespace Database\Factories;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apartment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Apartment '.$this->faker->unique()->numberBetween(1, 100),
            'description' => $this->faker->paragraph,
            'quantity' => $this->faker->randomDigit,
            'active' => $this->faker->randomElement([0, 1])
        ];
    }
}
