<?php

namespace Tests\Feature;

use App\Models\Hub;
use App\Models\Turbine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HubTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh --seed');
    }

    public function test_hub_list_page_loads_successfully()
    {
        $hub = Hub::first();

        $response = $this->get(route('hubs.index'));

        $response->assertStatus(200);

        $response->assertSee($hub->name);
    }

    public function test_hub_show_page_loads_successfully()
    {
        $hub = Hub::first();

        if (!$hub) {
            $this->fail('No hubs found in the database');
        }

        $response = $this->get(route('hubs.show', $hub));

        $response->assertStatus(200);

        $response->assertSee($hub->name);
    }

    public function test_hub_store_method()
    {
        $turbine = Turbine::first();

        $data = [
            'turbine' => $turbine->id,
            'name' => 'Test store',
            'damageAndWear' => 3,
        ];

        $response = $this->post(route('hubs.store'), $data);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('turbines.show', [$turbine->id]));

        $this->assertDatabaseHas('hubs', [
            'turbine_id' => $turbine->id,
            'name' => 'Test store',
        ]);
        
    }

    public function test_hub_update_method()
    {
        $hub = Hub::first();
        $turbine = Turbine::first();

        $data = [
            'turbine' => $turbine->id,
            'hub' => $hub->id,
            'damageAndWear' => 5,
        ];

        $response = $this->put(route('hubs.update', $hub), $data);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('turbines.show', [$turbine->id]));

        $this->assertDatabaseHas('hubs', [
            'turbine_id' => $turbine->id,
            'damage_and_wear_id' => 5
        ]);
    }

    public function test_hub_destroy_method()
    {
        $hub = Hub::first();
        $response = $this->delete(route('hubs.destroy', $hub));

        $response->assertStatus(302);
        $response->assertRedirect(route('hubs.index'));

        $this->assertDatabaseMissing('hubs', [
            'id' => $hub->id,
        ]);
    }    
}
