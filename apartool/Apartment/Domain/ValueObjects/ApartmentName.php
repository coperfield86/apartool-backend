<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Domain\ValueObjects;

 use Apartool\Shared\Domain\ValueObjects\StringValueObject;

 final class ApartmentName extends StringValueObject {

     public function __construct(string $value)
     {
         $this->isEmpty($value);
         parent::__construct($value);
     }

     private function isEmpty(string $name): void
     {
         if ( $name === '' || is_null($name)) {
             throw new \InvalidArgumentException('El nombre del apartamento es requerido');
         }
     }
}
