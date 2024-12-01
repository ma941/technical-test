<?php

namespace Database\Factories;

use App\Enum\TurbineStatusEnum;
use App\Models\WindFarm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turbine>
 */
class TurbineFactory extends Factory
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
            'wind_farm_id' => WindFarm::factory(),
            'inspection_date' => $this->faker->date(),
            'status' => TurbineStatusEnum::ACTIVE->value,
            'power_output' => $this->faker->randomFloat(2, 1, 3),
        ];
     }
}
