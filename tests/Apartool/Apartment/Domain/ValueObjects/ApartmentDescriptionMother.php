<?php

declare(strict_types = 1);

namespace Tests\Apartool\Apartment\Domain\ValueObjects;

 use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
 use Apartool\Shared\Domain\ValueObjects\StringValueObject;

 final class ApartmentDescriptionMother extends StringValueObject {
     public static function create(string $value)
     {
         return new ApartmentDescription($value);
     }

     public static function random() {
         $faker = \Faker\Factory::create();
         return self::create($faker->paragraph);
     }
}
