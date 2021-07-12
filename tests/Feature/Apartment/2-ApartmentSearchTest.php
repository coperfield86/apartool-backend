<?php

namespace Tests\Feature\Apartment;

use App\Models\Apartment;
use Tests\TestCase;

class ApartmentSearchTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_search_apartment()
    {
        $response = $this->getJson('/apartments?per_page=5');
        $response->assertStatus(200);
    }
}
