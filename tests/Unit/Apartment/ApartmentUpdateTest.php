<?php

namespace Tests\Unit\Apartment;

use Tests\Apartool\Apartment\ApartmentUnitTestCase;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentIdMother;

class ApartmentUpdateTest extends ApartmentUnitTestCase
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

    public function test_it_should_update_an_apartment(): void
    {
        $this->shouldFind(ApartmentIdMother::random());
        $this->shouldUpdate();
    }
}
