<?php

declare(strict_types = 1);

namespace Apartool\ApartmentCategory\Application\Find;

use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\ApartmentCategory\Domain\ApartmentCategory;
use Apartool\ApartmentCategory\Domain\ApartmentCategoryRepository;

final class ApartmentCategoryFinder
{
    private $repository;

    public function __construct(ApartmentCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function invoke(ApartmentId $id): ?ApartmentCategory {
        $response = $this->repository->find($id);
        return ApartmentCategory::fromArray($response);
    }
}
