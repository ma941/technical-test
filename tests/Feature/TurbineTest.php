<?php

namespace Tests\Feature;

use App\Models\Turbine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TurbineTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh --seed');
    }

    public function test_turbine_list_page_loads_successfully()
    {
        $turbine = Turbine::first();

        $response = $this->get(route('turbines.index'));

        $response->assertStatus(200);

        $response->assertSee($turbine->name);
    }

    public function test_turbine_show_page_loads_successfully()
    {
        $turbine = Turbine::first();

        if (!$turbine) {
            $this->fail('No turbine found in the database');
        }

        $response = $this->get(route('turbines.show', $turbine));

        $response->assertStatus(200);

        $response->assertSee($turbine->name);
    }
}
