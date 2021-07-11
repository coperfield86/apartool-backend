<?php

namespace App\Http\Controllers\Apartment;

use Apartool\Apartment\Application\Create\ApartmentCreator;
use Apartool\Apartment\Application\Delete\ApartmentDeleter;
use Apartool\Apartment\Application\Find\ApartmentFinder;
use Apartool\Apartment\Application\Search\ApartmentSearcher;
use Apartool\Apartment\Application\Update\ApartmentUpdater;
use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Apartment\CreateApartmentRequest;
use App\Http\Requests\Apartment\SearchApartmentRequest;
use App\Http\Requests\Apartment\UpdateApartmentRequest;
use Illuminate\Http\JsonResponse;

class ApartmentController extends ApiController
{
    private ApartmentCreator  $creator;
    private ApartmentUpdater  $updater;
    private ApartmentFinder   $finder;
    private ApartmentSearcher $searcher;
    private ApartmentDeleter  $deleter;

    public function __construct(
        ApartmentCreator $creator,
        ApartmentUpdater $updater,
        ApartmentFinder  $finder,
        ApartmentSearcher  $searcher,
        ApartmentDeleter  $deleter
    ) {
        $this->creator = $creator;
        $this->updater = $updater;
        $this->finder = $finder;
        $this->searcher = $searcher;
        $this->deleter = $deleter;
    }

    public function index(SearchApartmentRequest $request): JsonResponse {
        $currentPage = $request->input('page') ?? 1;
        $perPage = $request->input('per_page');

        $toArray = static function($apartment): array {
            return $apartment->toArray();
        };
        return $this->successResponse(array_map($toArray, $this->searcher->invoke($currentPage, $perPage)));
    }

    public function show(int $id): JsonResponse {
        $apartment = $this->finder->invoke(new ApartmentId($id));
        return $this->successResponse($apartment->toArray());
    }

    public function create(CreateApartmentRequest $request): JsonResponse  {
        $apartmentName = $request->input('name');
        $apartmentDescription = $request->input('description');
        $apartmentQuantity = $request->input('quantity');
        $apartmentActive = $request->input('active');

        $name        = new ApartmentName($apartmentName);
        $description = new ApartmentDescription($apartmentDescription);
        $quantity    = new ApartmentQuantity($apartmentQuantity);
        $active      = new ApartmentActive($apartmentActive);

        $this->creator->invoke($name, $description, $quantity, $active);
        return $this->successResponse('Apartment created successful', 201);
    }

    public function update(int $id, UpdateApartmentRequest $request): JsonResponse  {

        $apartmentName = $request->input('name');
        $apartmentDescription = $request->input('description');
        $apartmentQuantity = $request->input('quantity');
        $apartmentActive = $request->input('active');

        $id          = new ApartmentId($id);
        $name        = new ApartmentName($apartmentName);
        $description = new ApartmentDescription($apartmentDescription);
        $quantity    = new ApartmentQuantity($apartmentQuantity);
        $active      = new ApartmentActive($apartmentActive);

        $this->updater->invoke(
            $id,
            $name,
            $description,
            $quantity,
            $active
        );
        return $this->successResponse('Apartment updated successful', 204);
    }

    public function delete(int $id): JsonResponse {
        $id = new ApartmentId($id);

        $this->deleter->invoke($id);
        return $this->successResponse('Apartment deleted successful', 204);
    }
}
