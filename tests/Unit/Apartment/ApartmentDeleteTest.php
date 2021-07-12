<?php

namespace Tests\Unit\Apartment;

use Tests\Apartool\Apartment\ApartmentUnitTestCase;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentIdMother;

class ApartmentDeleteTest extends ApartmentUnitTestCase
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

    public function test_it_should_delete_an_apartment(): void
    {
        $this->shouldDelete(ApartmentIdMother::random());

    }
}
