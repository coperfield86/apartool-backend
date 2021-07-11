<?php


namespace Tests\Apartool\Apartment\Domain;

use Apartool\Apartment\Domain\Apartment;
use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentActiveMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentDescriptionMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentQuantityMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentNameMother;

class ApartmentMother
{
    public static function create(ApartmentName $name,
                                  ApartmentDescription $description,
                                  ApartmentQuantity $quantity,
                                  ApartmentActive $active): Apartment {
        return new Apartment(null, $name, $description, $quantity, $active, null);
    }

    public static function random(): Apartment {
        return self::create(
            ApartmentNameMother::random(),
            ApartmentDescriptionMother::random(),
            ApartmentQuantityMother::random(),
            ApartmentActiveMother::random());
    }
}
