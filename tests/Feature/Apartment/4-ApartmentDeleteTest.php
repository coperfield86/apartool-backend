<?php

namespace Tests\Feature\Apartment;

use Tests\TestCase;

class ApartmentDeleteTest extends TestCase
{
    /**
     * @depends Tests\Feature\Apartment\ApartmentCreateTest::test_create_apartment
     */
    public function test_delete_apartment(int $id)
    {
        $response = $this->deleteJson('/apartments/'.$id);
        $response->assertStatus(204);
    }
}
