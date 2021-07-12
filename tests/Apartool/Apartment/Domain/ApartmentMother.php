<?php


namespace Tests\Apartool\Apartment\Domain;

use Apartool\Apartment\Domain\Apartment;
use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Apartment\Domain\ValueObjects\ApartmentCreatedAt;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentActiveMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentCreatedAtMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentDescriptionMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentIdMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentNameMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentQuantityMother;

class ApartmentMother
{
    public static function create(ApartmentId $id,
                                  ApartmentName $name,
                                  ApartmentDescription $description,
                                  ApartmentQuantity $quantity,
                                  ApartmentActive $active,
                                  ApartmentCreatedAt $createdAt): Apartment {
        return new Apartment($id, $name, $description, $quantity, $active, $createdAt);
    }

    public static function random(): Apartment {
        return self::create(
            ApartmentIdMother::random(),
            ApartmentNameMother::random(),
            ApartmentDescriptionMother::random(),
            ApartmentQuantityMother::random(),
            ApartmentActiveMother::random(),
            ApartmentCreatedAtMother::current());
    }
}
