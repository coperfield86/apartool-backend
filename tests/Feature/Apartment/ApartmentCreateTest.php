<?php

namespace Tests\Feature\Apartment;

use App\Models\Apartment;
use Tests\TestCase;

class ApartmentCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_apartment()
    {
        $apartment = Apartment::factory()->create();

        $response = $this->postJson('/apartments',$apartment->toArray());
        $response->assertStatus(201);
    }
}
