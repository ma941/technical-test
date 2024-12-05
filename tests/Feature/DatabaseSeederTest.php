<?php

namespace Tests\Feature;

use App\Models\Turbine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DatabaseSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_database_seeder_populates_the_database()
    {
        $this->artisan('migrate:fresh --seed');

        $turbine = Turbine::first();

        $response = $this->get(route('turbines.show', $turbine->id));

        $response->assertStatus(200);

        $response->assertSee($turbine->name);
    }
}
