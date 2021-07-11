<?php

declare(strict_types = 1);

namespace Tests\Apartool\Apartment\Domain\ValueObjects;

use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Shared\Domain\ValueObjects\IntValueObject;

 final class ApartmentActiveMother extends IntValueObject {

     public static function create(int $value)
     {
         return new ApartmentActive($value);
     }

     public static function random() {
         $faker = \Faker\Factory::create();
         return self::create($faker->randomElement([0, 1]));
     }
}
