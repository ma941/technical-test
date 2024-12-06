<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WindFarm>
 */
class WindFarmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'location' => $this->randomLocation(),
        ];
    }

    private function randomLocation()
    {
        $locations = [
            'Newcastle upon Tyne',
            'Edinburgh',
            'Glasgow',
            'Birmingham',
            'London'
        ];

        return $locations[array_rand($locations)];
    }
}
