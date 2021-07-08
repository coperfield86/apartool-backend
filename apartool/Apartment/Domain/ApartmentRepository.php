<?php


namespace Apartool\Apartment\Domain;

use Apartool\Apartment\Domain\ValueObjects\ApartmentId;

interface ApartmentRepository {

    public function save(Apartment $apartment): void;

    public function update(ApartmentId $id, Apartment $apartment): void;

    public function find(ApartmentId $id): array;

    public function search($currentPage, $perPage): array;
}
