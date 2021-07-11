<?php

declare(strict_types = 1);

namespace Apartool\ApartmentCategory\Domain\ValueObjects;

 final class ApartmentCategoryApartmentId {
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
             throw new \InvalidArgumentException('El Id del apartamento es requerido');
         }
         return $id;
     }


}
