<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Infrastructure\Persistence;

use Apartool\Apartment\Domain\Apartment;
use Apartool\Apartment\Domain\ApartmentRepository;
use Apartool\Apartment\Domain\ValueObjects\ApartmentCategoryId;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;

final class EloquentApartmentRepository implements ApartmentRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\Apartment();
    }

    public function save(Apartment $apartment): int
    {
        $this->model->name          = $apartment->getName()->value();
        $this->model->description   = $apartment->getDescription()->value();
        $this->model->quantity      =  $apartment->getQuantity()->value();
        $this->model->active        =  $apartment->getActive()->value();

        $this->model->save();
        return $this->model->id;
    }

    public function update(ApartmentId $id, Apartment $apartment): bool
    {
        $modelToUpdate = $this->model->findOrFail($id->value());

        $modelToUpdate->name          = $apartment->getName()->value();
        $modelToUpdate->description   = $apartment->getDescription()->value();
        $modelToUpdate->quantity      = $apartment->getQuantity()->value();
        $modelToUpdate->active        = $apartment->getActive()->value();

        return $modelToUpdate->update();
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
        return $this->model->findOrFail($id->value())->delete();
    }
}
