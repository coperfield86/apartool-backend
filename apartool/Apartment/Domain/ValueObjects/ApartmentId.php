<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Domain\ValueObjects;

 final class ApartmentId {
     private $value;

     public function __construct(int $id)
     {
         $this->value = $this->setValue($id);
     }

     public function value(): int
     {
         return $this->value;
     }

     private function setValue(int $id): ?int
     {
         if ($id < 0)
         {
             throw new \InvalidArgumentException('El Id es requerido');
         }
         return $id;
     }

     public function toArray() {
         return [
             'id' => $this->value
         ];
     }
}
