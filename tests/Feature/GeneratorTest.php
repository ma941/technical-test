<?php

namespace Tests\Feature;

use App\Models\Generator;
use App\Models\Turbine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneratorTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh --seed');
    }

    public function test_generator_list_page_loads_successfully()
    {
        $generator = Generator::first();

        $response = $this->get(route('generators.index'));

        $response->assertStatus(200);

        $response->assertSee($generator->name);
    }

    public function test_generator_show_page_loads_successfully()
    {
        $generator = Generator::first();

        if (!$generator) {
            $this->fail('No generators found in the database');
        }

        $response = $this->get(route('generators.show', $generator));

        $response->assertStatus(200);

        $response->assertSee($generator->name);
    }

    public function test_generator_store_method()
    {
        $turbine = Turbine::first();

        $data = [
            'turbine' => $turbine->id,
            'name' => 'Test store',
            'damageAndWear' => 3,
        ];

        $response = $this->post(route('generators.store'), $data);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('turbines.show', [$turbine->id]));

        $this->assertDatabaseHas('generators', [
            'turbine_id' => $turbine->id,
            'name' => 'Test store',
        ]);
        
    }

    public function test_generator_update_method()
    {
        $generator = Generator::first();
        $turbine = Turbine::first();

        $data = [
            'turbine' => $turbine->id,
            'generator' => $generator->id,
            'damageAndWear' => 5,
        ];

        $response = $this->put(route('generators.update', $generator), $data);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('turbines.show', [$turbine->id]));

        $this->assertDatabaseHas('generators', [
            'turbine_id' => $turbine->id,
            'damage_and_wear_id' => 5
        ]);
    }

    public function test_generator_destroy_method()
    {
        $generator = Generator::first();
        $response = $this->delete(route('generators.destroy', $generator));

        $response->assertStatus(302);
        $response->assertRedirect(route('generators.index'));

        $this->assertDatabaseMissing('generators', [
            'id' => $generator->id,
        ]);
    }    
}
