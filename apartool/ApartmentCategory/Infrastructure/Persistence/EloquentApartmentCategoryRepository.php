<?php

declare(strict_types = 1);

namespace Apartool\ApartmentCategory\Infrastructure\Persistence;

use Apartool\Apartment\Domain\ValueObjects\ApartmentCategoryId;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\ApartmentCategory\Domain\ApartmentCategory;
use Apartool\ApartmentCategory\Domain\ApartmentCategoryRepository;
use Carbon\Carbon;

final class EloquentApartmentCategoryRepository implements ApartmentCategoryRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\ApartmentCategory();
    }

    public function save(ApartmentCategory $apartment): void
    {
        $this->model->apartment_id   = $apartment->getApartmentId()->value();
        $this->model->title         = $apartment->getTitle()->value();
        $this->model->description   = $apartment->getDescription()->value();

        $this->model->save();
    }

    public function update(ApartmentId $id, ApartmentCategory $apartmentCategory): void
    {
        $modelToUpdate = $this->model->findOrFail($id->value());

        $modelToUpdate->apartment_id   = $apartmentCategory->getApartmentId()->value();
        $modelToUpdate->title         = $apartmentCategory->getTitle()->value();
        $modelToUpdate->description   = $apartmentCategory->getDescription()->value();

        $modelToUpdate->update();
    }

    public function find(ApartmentId $id): array
    {
        return $this->model->findOrFail($id->value())->toArray();
    }

    public function search($currentPage, $perPage): array
    {
        $rows = $this->model->all();
        if ($perPage) {
            $startingPoint = ($currentPage * $perPage) - $perPage;
            return $rows->slice($startingPoint, $perPage)->values()->toArray();
        }
        return $rows->toArray();
    }

    public function delete(ApartmentId $id): bool
    {
        $model = $this->model->findOrFail($id->value());
        $model->deleted_at = Carbon::now();
        return $model->update();
    }
}
