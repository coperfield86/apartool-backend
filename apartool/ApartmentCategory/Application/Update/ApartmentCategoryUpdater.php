<?php

declare(strict_types = 1);

namespace Apartool\ApartmentCategory\Application\Update;

use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\ApartmentCategory\Application\Find\ApartmentCategoryFinder;
use Apartool\ApartmentCategory\Domain\ApartmentCategory;
use Apartool\ApartmentCategory\Domain\ApartmentCategoryRepository;
use Apartool\ApartmentCategory\Domain\ValueObjects\ApartmentCategoryDescription;
use Apartool\ApartmentCategory\Domain\ValueObjects\ApartmentCategoryTitle;

final class ApartmentCategoryUpdater
{
    private $finder;
    private $repository;

    public function __construct(ApartmentCategoryFinder $finder, ApartmentCategoryRepository $repository)
    {
        $this->finder = $finder;
        $this->repository = $repository;
    }

    public function invoke(ApartmentId $id,
                           ApartmentId $apartmentId,
                           ApartmentCategoryTitle $title,
                           ApartmentCategoryDescription $description): void {
        $apartmentCategoryFinded = $this->finder->invoke($id);

        $this->repository->update($id, new ApartmentCategory(
            $apartmentId ?? $apartmentCategoryFinded->getApartmentId(),
            $title ?? $apartmentCategoryFinded->getTitle(),
            $description ?? $apartmentCategoryFinded->getDescription()
         ));
    }
}
