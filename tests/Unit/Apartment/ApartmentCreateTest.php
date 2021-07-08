<?php

namespace Tests\Unit\Apartment;

use Apartool\Apartment\Application\Create\ApartmentCreator;
use Apartool\Apartment\Domain\Apartment;
use Apartool\Apartment\Domain\ApartmentRepository;
use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;
use Tests\TestCase;

class ApartmentCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_apartment(): void
    {
        $repository = $this->createMock(ApartmentRepository::class);
        $creator    = new ApartmentCreator($repository);

        $name        = new ApartmentName();
        $description = new ApartmentDescription($apartmentDescription);
        $quantity    = new ApartmentQuantity($apartmentQuantity);
        $active      = new ApartmentActive($apartmentActive);
        $apartment = new Apartment($id, $name, $duration);
        $repository->method('save')->with($course);
        $creator->invoke($id, $name, $duration);
    }
}
