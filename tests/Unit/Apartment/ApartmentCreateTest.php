<?php

namespace Tests\Unit\Apartment;

use Tests\Apartool\Apartment\ApartmentUnitTestCase;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentActiveMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentDescriptionMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentNameMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentQuantityMother;

class ApartmentCreateTest extends ApartmentUnitTestCase
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

    function test_it_should_create_an_apartment(): void
    {
        $this->shouldSave(
            ApartmentNameMother::random(),
            ApartmentDescriptionMother::random(),
            ApartmentQuantityMother::random(),
            ApartmentActiveMother::random());
    }

    function test_validate_name_length(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->shouldSave(
            ApartmentNameMother::emptyValue(),
            ApartmentDescriptionMother::random(),
            ApartmentQuantityMother::random(),
            ApartmentActiveMother::random());
    }

    function test_validate_quantity_value(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->shouldSave(
            ApartmentDescriptionMother::random(),
            ApartmentDescriptionMother::random(),
            ApartmentQuantityMother::lessThan0(),
            ApartmentActiveMother::random());
    }
}
