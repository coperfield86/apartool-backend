<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Application\Create;

use Apartool\Apartment\Domain\Apartment;
use Apartool\Apartment\Domain\ApartmentRepository;
use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;

final class ApartmentCreator
{
    private ApartmentRepository $repository;

    public function __construct(ApartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function invoke(
        ApartmentName $name,
        ApartmentDescription $description,
        ApartmentQuantity $quantity,
        ApartmentActive $active): ApartmentId {

        $id = $this->repository->save(new Apartment(null, $name, $description, $quantity, $active, null));
        return new ApartmentId($id);
    }
}
