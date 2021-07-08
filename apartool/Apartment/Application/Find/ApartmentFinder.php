<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Application\Find;

use Apartool\Apartment\Domain\Apartment;
use Apartool\Apartment\Domain\ApartmentRepository;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;

final class ApartmentFinder
{
    private $repository;

    public function __construct(ApartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function invoke(ApartmentId $id): ?Apartment {
        $response = $this->repository->find($id);
        return Apartment::fromArray($response);
    }
}
