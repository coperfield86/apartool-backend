<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Application\Delete;

use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\ApartmentCategory\Domain\ApartmentCategoryRepository;

final class ApartmentCategoryDeleter
{
    private ApartmentCategoryRepository $repository;

    public function __construct(ApartmentCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function invoke(ApartmentId $id): bool {
        return $this->repository->delete($id);
    }
}
