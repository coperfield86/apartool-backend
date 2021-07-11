<?php

namespace App\Http\Controllers\ApartmentCategory;

use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\ApartmentCategory\Application\Create\ApartmentCategoryCreator;
use Apartool\ApartmentCategory\Application\Find\ApartmentCategoryFinder;
use Apartool\ApartmentCategory\Application\Search\ApartmentCategorySearcher;
use Apartool\ApartmentCategory\Application\Update\ApartmentCategoryUpdater;
use Apartool\ApartmentCategory\Domain\ValueObjects\ApartmentCategoryDescription;
use Apartool\ApartmentCategory\Domain\ValueObjects\ApartmentCategoryTitle;
use App\Http\Controllers\ApiController;
use App\Http\Requests\ApartmentCategory\CreateApartmentCategoryRequest;
use App\Http\Requests\ApartmentCategory\SearchApartmentCategoryRequest;
use App\Http\Requests\ApartmentCategory\UpdateApartmentCategoryRequest;
use Illuminate\Http\JsonResponse;

class ApartmentCategoryController extends ApiController
{
    private ApartmentCategoryCreator $creator;
    private ApartmentCategoryUpdater $updater;
    private ApartmentCategoryFinder $finder;
    private ApartmentCategorySearcher $searcher;

    public function __construct(
        ApartmentCategoryCreator $creator,
        ApartmentCategoryUpdater $updater,
        ApartmentCategoryFinder  $finder,
        ApartmentCategorySearcher  $searcher
    ) {
        $this->creator = $creator;
        $this->updater = $updater;
        $this->finder = $finder;
        $this->searcher = $searcher;
    }

    public function index(SearchApartmentCategoryRequest $request): JsonResponse {
        $currentPage = $request->input('page') ?? 1;
        $perPage = $request->input('per_page');

        $toArray = static function($apartmentCategory): array {
            return $apartmentCategory->toArray();
        };
        return $this->successResponse(array_map($toArray, $this->searcher->invoke($currentPage, $perPage)));
    }

    public function show(int $id): JsonResponse {
        $apartmentCategory = $this->finder->invoke(new ApartmentId($id));
        return $this->successResponse($apartmentCategory->toArray());
    }

    public function create(CreateApartmentCategoryRequest $request): JsonResponse  {
        $apartmentId                  = $request->input('apartmentId');
        $apartmentCategoryTitle       = $request->input('title');
        $apartmentCategoryDescription = $request->input('description');

        $apartmentId  = new ApartmentId($apartmentId);
        $title        = new ApartmentCategoryTitle($apartmentCategoryTitle);
        $description  = new ApartmentCategoryDescription($apartmentCategoryDescription);

        $this->creator->invoke($apartmentId, $title, $description);
        return $this->successResponse('Apartment Category created successful', 201);
    }

    public function update(int $id, UpdateApartmentCategoryRequest $request): JsonResponse  {

        $apartmentId          = $request->input('apartmentId');
        $apartmentTitle       = $request->input('title');
        $apartmentDescription = $request->input('description');

        $id          = new ApartmentId($id);
        $apartmentId = new ApartmentId($apartmentId);
        $title       = new ApartmentCategoryTitle($apartmentTitle);
        $description = new ApartmentCategoryDescription($apartmentDescription);

        $this->updater->invoke(
            $id,
            $apartmentId,
            $title,
            $description
        );
        return $this->successResponse('Apartment updated successful');
    }
}
