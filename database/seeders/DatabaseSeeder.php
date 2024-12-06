<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(TurbineSeeder::class);
        $this->call(BladeSeeder::class);
        $this->call(RotorSeeder::class);
        $this->call(HubSeeder::class);
        $this->call(GeneratorSeeder::class);
    }
}
