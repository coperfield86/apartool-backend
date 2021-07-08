<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Domain\ValueObjects;

use Apartool\Shared\Domain\ValueObjects\IntValueObject;

 final class ApartmentActive extends IntValueObject {

     public function __construct(int $value)
     {
         parent::__construct($value);
     }

     public function value(): int
     {
         $value = parent::value();
         return is_null($value) ? 0 : $this->value;
     }
}
