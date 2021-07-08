<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Domain\ValueObjects;

use Apartool\Shared\Domain\ValueObjects\IntValueObject;

 final class ApartmentQuantity extends IntValueObject {

     public function __construct(int $value)
     {
         $this->isLessThan0($value);
         parent::__construct($value);
     }

     private function isLessThan0(int $quantity): void
     {
         if ( $quantity < 0) {
             throw new \InvalidArgumentException('El nombre del apartamento es requerido');
         }
     }
}
