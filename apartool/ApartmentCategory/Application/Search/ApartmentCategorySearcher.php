<?php

declare(strict_types = 1);

namespace Apartool\ApartmentCategory\Application\Search;

use Apartool\ApartmentCategory\Domain\ApartmentCategory;
use Apartool\ApartmentCategory\Domain\ApartmentCategoryRepository;

final class ApartmentCategorySearcher
{
    private ApartmentCategoryRepository $repository;

    public function __construct(ApartmentCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function invoke($currentPage, $perPage): array {
        $toResponse = static function($apartmentCategory): ApartmentCategory {
            return ApartmentCategory::fromArray($apartmentCategory);
        };
        return array_map($toResponse, $this->repository->search($currentPage, $perPage));
    }
}
