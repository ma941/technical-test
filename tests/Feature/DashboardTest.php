<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_page_loads_successfully()
    {
        $response = $this->get(route('dashboard'));

        $response->assertStatus(200);
    }
}
