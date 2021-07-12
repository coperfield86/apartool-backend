<?php

declare(strict_types = 1);

namespace Apartool\ApartmentCategory\Application\Create;

use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\ApartmentCategory\Application\Find\ApartmentCategoryFinder;
use Apartool\ApartmentCategory\Domain\ApartmentCategory;
use Apartool\ApartmentCategory\Domain\ApartmentCategoryRepository;
use Apartool\ApartmentCategory\Domain\ValueObjects\ApartmentCategoryDescription;
use Apartool\ApartmentCategory\Domain\ValueObjects\ApartmentCategoryTitle;

final class ApartmentCategoryCreator
{
    private ApartmentCategoryRepository $repository;
    private ApartmentCategoryFinder $finder;

    public function __construct(ApartmentCategoryFinder $finder, ApartmentCategoryRepository $repository)
    {
        $this->finder = $finder;
        $this->repository = $repository;
    }

    public function invoke(
        ApartmentId $apartmentId,
        ApartmentCategoryTitle $title,
        ApartmentCategoryDescription $description): bool {

        if ($this->finder->invoke($apartmentId)) {
            throw new \InvalidArgumentException('Apartment with id '.$apartmentId->value().' already has a category assigned');
        }

        return $this->repository->save(new ApartmentCategory($apartmentId, $title, $description));
    }
}
