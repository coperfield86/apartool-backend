<?php

declare(strict_types = 1);

namespace Tests\Apartool\Apartment\Domain\ValueObjects;

use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;
use Apartool\Shared\Domain\ValueObjects\IntValueObject;

 final class ApartmentQuantityMother extends IntValueObject {

     public static function create(int $value)
     {
         return new ApartmentQuantity($value);
     }

     public static function random(): ApartmentQuantity {
         $faker = \Faker\Factory::create();
         return self::create($faker->randomDigit);
     }

     public static function lessThan0(): ApartmentQuantity {
         return self::create(-5);
     }
}
