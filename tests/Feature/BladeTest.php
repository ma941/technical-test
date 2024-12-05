<?php

namespace Tests\Feature;

use App\Models\Blade;
use App\Models\Turbine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BladeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh --seed');
    }

    public function test_blade_list_page_loads_successfully()
    {
        $blade = Blade::first();

        $response = $this->get(route('blades.index'));

        $response->assertStatus(200);

        $response->assertSee($blade->name);
    }

    public function test_blade_show_page_loads_successfully()
    {
        $blade = Blade::first();

        if (!$blade) {
            $this->fail('No blades found in the database');
        }

        $response = $this->get(route('blades.show', $blade));

        $response->assertStatus(200);

        $response->assertSee($blade->name);
    }

    public function test_blade_store_method()
    {
        $turbine = Turbine::first();

        $data = [
            'turbine' => $turbine->id,
            'name' => 'Test store',
            'damageAndWear' => 3,
        ];

        $response = $this->post(route('blades.store'), $data);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('turbines.show', [$turbine->id]));

        $this->assertDatabaseHas('blades', [
            'turbine_id' => $turbine->id,
            'name' => 'Test store',
        ]);
        
    }

    public function test_blade_update_method()
    {
        $blade = Blade::first();
        $turbine = Turbine::first();

        $data = [
            'turbine' => $turbine->id,
            'blade' => $blade->id,
            'damageAndWear' => 5,
        ];

        $response = $this->put(route('blades.update', $blade), $data);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('turbines.show', [$turbine->id]));

        $this->assertDatabaseHas('blades', [
            'turbine_id' => $turbine->id,
            'damage_and_wear_id' => 5
        ]);
    }

    public function test_blade_destroy_method()
    {
        $blade = Blade::first();
        $response = $this->delete(route('blades.destroy', $blade));

        $response->assertStatus(302);
        $response->assertRedirect(route('blades.index'));

        $this->assertDatabaseMissing('blades', [
            'id' => $blade->id,
        ]);
    }    
}
