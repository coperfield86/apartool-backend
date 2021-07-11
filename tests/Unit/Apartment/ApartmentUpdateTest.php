<?php

namespace Tests\Unit\Apartment;

use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentActiveMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentDescriptionMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentNameMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentQuantityMother;
use Tests\TestCase;

class ApartmentUpdateTest extends TestCase
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

    public function test_it_should_update_a_apartment(): void
    {
        /*$this->should(
            ApartmentNameMother::random(),
            ApartmentDescriptionMother::random(),
            ApartmentQuantityMother::random(),
            ApartmentActiveMother::random());*/
    }
}
