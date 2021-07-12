<?php

namespace Tests\Feature\Apartment;

use App\Models\Apartment;
use Tests\TestCase;

class ApartmentUpdateTest extends TestCase
{
    /**
     * @depends Tests\Feature\Apartment\ApartmentCreateTest::test_create_apartment
     */
    public function test_update_apartment(int $id)
    {
        $apartment = Apartment::factory()->definition();
        $response = $this->putJson('/apartments/'.$id, $apartment);
        $response->assertStatus(204);
    }
}
