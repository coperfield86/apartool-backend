<?php

namespace Tests\Unit\Apartment;

use Apartool\Apartment\Application\Create\ApartmentCreator;
use Apartool\Apartment\Domain\ApartmentRepository;
use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;
use Mockery\MockInterface;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentActiveMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentDescriptionMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentNameMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentQuantityMother;
use Tests\TestCase;

class ApartmentCreateTest extends TestCase
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

    function test_it_should_create_a_apartment(): void
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

    protected function repository(): MockInterface
    {
        return $this->mock(ApartmentRepository::class);
    }

    protected function shouldSave(ApartmentName $name,
                                  ApartmentDescription $description,
                                  ApartmentQuantity $quantity,
                                  ApartmentActive $active) {
        $mock = $this->repository();

        $mock->shouldReceive('save')
            ->once()
            ->andReturnTrue();
        $creator = new ApartmentCreator($mock);
        $creator->invoke(
            $name,
            $description,
            $quantity,
            $active
        );
    }
}
