<?php

namespace Tests\Feature;

use App\Models\Rotor;
use App\Models\Turbine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RotorTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh --seed');
    }

    public function test_rotor_list_page_loads_successfully()
    {
        $rotor = Rotor::first();

        $response = $this->get(route('rotors.index'));

        $response->assertStatus(200);

        $response->assertSee($rotor->name);
    }

    public function test_rotor_show_page_loads_successfully()
    {
        $rotor = Rotor::first();

        if (!$rotor) {
            $this->fail('No rotors found in the database');
        }

        $response = $this->get(route('rotors.show', $rotor));

        $response->assertStatus(200);

        $response->assertSee($rotor->name);
    }

    public function test_rotor_store_method()
    {
        $turbine = Turbine::first();

        $data = [
            'turbine' => $turbine->id,
            'name' => 'Test store',
            'damageAndWear' => 3,
        ];

        $response = $this->post(route('rotors.store'), $data);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('turbines.show', [$turbine->id]));

        $this->assertDatabaseHas('rotors', [
            'turbine_id' => $turbine->id,
            'name' => 'Test store',
        ]);
        
    }

    public function test_rotor_update_method()
    {
        $rotor = Rotor::first();
        $turbine = Turbine::first();

        $data = [
            'turbine' => $turbine->id,
            'rotor' => $rotor->id,
            'damageAndWear' => 5,
        ];

        $response = $this->put(route('rotors.update', $rotor), $data);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('turbines.show', [$turbine->id]));

        $this->assertDatabaseHas('rotors', [
            'turbine_id' => $turbine->id,
            'damage_and_wear_id' => 5
        ]);
    }

    public function test_rotor_destroy_method()
    {
        $rotor = Rotor::first();
        $response = $this->delete(route('rotors.destroy', $rotor));

        $response->assertStatus(302);
        $response->assertRedirect(route('rotors.index'));

        $this->assertDatabaseMissing('rotors', [
            'id' => $rotor->id,
        ]);
    }    
}
