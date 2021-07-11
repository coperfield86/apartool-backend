<?php

declare(strict_types = 1);

namespace Apartool\ApartmentCategory\Application\Create;

use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\ApartmentCategory\Domain\ApartmentCategory;
use Apartool\ApartmentCategory\Domain\ApartmentCategoryRepository;
use Apartool\ApartmentCategory\Domain\ValueObjects\ApartmentCategoryDescription;
use Apartool\ApartmentCategory\Domain\ValueObjects\ApartmentCategoryTitle;

final class ApartmentCategoryCreator
{
    private $repository;

    public function __construct(ApartmentCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function invoke(
        ApartmentId $apartmentId,
        ApartmentCategoryTitle $title,
        ApartmentCategoryDescription $description) {

        //Primero buscamos a ver si ya el apartamento no tiene categoria asignada.

        $this->repository->save(new ApartmentCategory($apartmentId, $title, $description));
    }
}
