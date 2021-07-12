<?php

declare(strict_types = 1);

namespace Tests\Apartool\Apartment\Domain\ValueObjects;

use Apartool\Apartment\Domain\ValueObjects\ApartmentCreatedAt;
use apartool\Shared\Domain\ValueObjects\StringValueObject;
use Carbon\Carbon;

final class ApartmentCreatedAtMother extends StringValueObject {

     public static function create(string $value)
     {
         return new ApartmentCreatedAt($value);
     }

     public static function current(): ApartmentCreatedAt {
         return self::create(Carbon::now()->format('Y-m-d H:m:s'));
     }
}
