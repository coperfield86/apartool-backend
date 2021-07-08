<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_is_web_server_up(): void
    {
        $response = $this->get('/health');
        $response
            ->assertStatus(200)
            ->assertSee('OK');
    }
}
