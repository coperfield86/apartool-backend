<?php

namespace Apartool\ApartmentCategory\Domain;

use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\ApartmentCategory\Domain\ValueObjects\ApartmentCategoryId;

interface ApartmentCategoryRepository {

    public function save(ApartmentCategory $apartmentCategory): bool;

    public function update(ApartmentId $id, ApartmentCategory $apartmentCategory): void;

    public function find(ApartmentId $id): array;

    public function search($currentPage, $perPage): array;

    public function delete(ApartmentId $id): bool;
}
