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
    public function test_create_apartment(): int
    {
        $apartment = Apartment::factory()->definition();

        $response = $this->postJson('/apartments',$apartment);
        $response->assertStatus(201);
        return $response['id'];
    }
}
