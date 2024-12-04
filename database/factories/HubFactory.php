<?php

namespace Database\Factories;

use App\Models\DamageAndWear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hub>
 */
class HubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'damage_and_wear_id' => DamageAndWear::inRandomOrder()->value('id'),
        ];
    }
}
