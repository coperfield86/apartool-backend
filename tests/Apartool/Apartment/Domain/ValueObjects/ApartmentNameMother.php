<?php

declare(strict_types = 1);

namespace Tests\Apartool\Apartment\Domain\ValueObjects;

 use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
 use Apartool\Shared\Domain\ValueObjects\StringValueObject;

 final class ApartmentNameMother extends StringValueObject {

     public static function create(string $value)
     {
         return new ApartmentName($value);
     }

     public static function random() {
         $faker = \Faker\Factory::create();
         return self::create($faker->name);
     }

     public static function emptyValue() {
         return self::create('');
     }
}
