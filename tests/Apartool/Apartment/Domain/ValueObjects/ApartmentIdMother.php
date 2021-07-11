<?php

declare(strict_types = 1);

namespace Tests\Apartool\Apartment\Domain\ValueObjects;

 use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
 use apartool\Shared\Domain\ValueObjects\IntValueObject;

 final class ApartmentIdMother extends IntValueObject {

     public static function create(int $value)
     {
         return new ApartmentId($value);
     }

     public static function random() {
         $faker = \Faker\Factory::create();
         return self::create($faker->randomDigit);
     }

     public static function badValue() {
         return self::create(0);
     }
}
