<?php

namespace Tests\Unit\Apartment;

use Tests\Apartool\Apartment\ApartmentUnitTestCase;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentIdMother;

class ApartmentFindTest extends ApartmentUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        \Mockery::close();
    }

    public function test_it_should_search_a_apartment(): void
    {
        $this->shouldSearch(ApartmentIdMother::random());
    }
}
