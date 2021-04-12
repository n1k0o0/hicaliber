<?php

namespace Database\Factories;

use App\Models\House;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = House::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
		        'name' => $this->faker->name,
		        'price' => $this->faker->numberBetween(100000, 1000000),
		        'bedrooms' => $this->faker->numberBetween(2, 5),
		        'bathrooms' => $this->faker->numberBetween(2, 3),
		        'storeys' => $this->faker->numberBetween(1, 2),
		        'garages' => $this->faker->numberBetween(1, 2),
        ];
    }
}
