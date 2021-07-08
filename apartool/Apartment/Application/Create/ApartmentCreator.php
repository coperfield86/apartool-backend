<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Application\Create;

use Apartool\Apartment\Application\Dto\CreateApartmentRequestDto;
use Apartool\Apartment\Domain\Apartment;
use Apartool\Apartment\Domain\ApartmentRepository;
use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;

final class ApartmentCreator
{
    private $repository;

    public function __construct(ApartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function invoke(
        ApartmentName $name,
        ApartmentDescription $description,
        ApartmentQuantity $quantity,
        ApartmentActive $active) {

        $this->repository->save(new Apartment(null, $name, $description, $quantity, $active, null));

        /*
         * public function searchAll(): BackofficeCoursesResponse
    {
        return new BackofficeCoursesResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static fn(BackofficeCourse $course) => new BackofficeCourseResponse(
            $course->id(),
            $course->name(),
            $course->duration()
        );
    }
         */
    }
}
