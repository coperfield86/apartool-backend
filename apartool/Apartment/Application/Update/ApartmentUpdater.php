<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Application\Update;

use Apartool\Apartment\Application\Find\ApartmentFinder;
use Apartool\Apartment\Domain\Apartment;
use Apartool\Apartment\Domain\ApartmentRepository;
use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;

final class ApartmentUpdater
{
    private $finder;
    private $repository;

    public function __construct(ApartmentFinder $finder, ApartmentRepository $repository)
    {
        $this->finder = $finder;
        $this->repository = $repository;
    }

    public function invoke(ApartmentId $id,
                           ApartmentName $name,
                           ApartmentDescription $description,
                           ApartmentQuantity $quantity,
                           ApartmentActive $active): void {
        $apartmentFinded = $this->finder->invoke($id);

        $this->repository->update($apartmentFinded->getId(), new Apartment(
            $apartmentFinded->getId(),
            $name ?? $apartmentFinded->getName(),
            $description ?? $apartmentFinded->getDescription(),
            $quantity ?? $apartmentFinded->getQuantity(),
            $active ?? $apartmentFinded->getActive(),
            $apartmentFinded->getCreatedAt(),
         ));
    }
}
