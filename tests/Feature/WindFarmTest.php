<?php

namespace Tests\Feature;

use App\Models\WindFarm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WindFarmTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh --seed');
    }

    public function test_windfarm_list_page_loads_successfully()
    {
        $windfarm = WindFarm::first();

        $response = $this->get(route('windfarms.index'));

        $response->assertStatus(200);

        $response->assertSee($windfarm->name);
    }

    public function test_windfarm_show_page_loads_successfully()
    {
        $windfarm = WindFarm::first();

        if (!$windfarm) {
            $this->fail('No windfarm found in the database');
        }

        $response = $this->get(route('windfarms.show', $windfarm));

        $response->assertStatus(200);

        $response->assertSee($windfarm->name);
    }
}
