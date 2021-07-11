<?php


namespace Apartool\Apartment\Domain;

use Apartool\Apartment\Domain\ValueObjects\ApartmentCategoryId;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;

interface ApartmentRepository {

    public function save(Apartment $apartment): bool;

    public function update(ApartmentId $id, Apartment $apartment): bool;

    public function find(ApartmentId $id): array;

    public function search($currentPage, $perPage): array;

    public function delete(ApartmentId $id): bool;
}
