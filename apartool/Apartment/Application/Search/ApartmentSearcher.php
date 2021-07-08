<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Application\Search;

use Apartool\Apartment\Application\Dto\CreateApartmentRequestDto;
use Apartool\Apartment\Domain\Apartment;
use Apartool\Apartment\Domain\ApartmentRepository;

final class ApartmentSearcher
{
    private ApartmentRepository $repository;

    public function __construct(ApartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function invoke($currentPage, $perPage): array {
        $toResponse = static function($apartment): Apartment {
            return Apartment::fromArray($apartment);
        };
        return array_map($toResponse, $this->repository->search($currentPage, $perPage));
    }
}
