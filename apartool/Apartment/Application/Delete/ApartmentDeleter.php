<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Application\Delete;

use Apartool\Apartment\Domain\Apartment;
use Apartool\Apartment\Domain\ApartmentRepository;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;

final class ApartmentDeleter
{
    private ApartmentRepository $repository;

    public function __construct(ApartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function invoke(ApartmentId $id): bool {
        /*$apartmentFinded = $this->finder->invoke($id);

        return $this->repository->update($apartmentFinded->getId(), new Apartment(
            $apartmentFinded->getId(),
            $name ?? $apartmentFinded->getName(),
            $description ?? $apartmentFinded->getDescription(),
            $quantity ?? $apartmentFinded->getQuantity(),
            $active ?? $apartmentFinded->getActive(),
            $apartmentFinded->getCreatedAt(),
        ));*/
        return true;
    }
}
