<?php

declare(strict_types = 1);

namespace Apartool\ApartmentCategory\Domain;

use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\ApartmentCategory\Domain\ValueObjects\ApartmentCategoryDescription;
use Apartool\ApartmentCategory\Domain\ValueObjects\ApartmentCategoryTitle;

final class ApartmentCategory
{
    private ?ApartmentId $id;
    private ApartmentCategoryTitle $title;
    private ApartmentCategoryDescription $description;

    public function __construct(
        ?ApartmentId $id,
        ApartmentCategoryTitle $title,
        ApartmentCategoryDescription $description) {
        $this->id          = $id;
        $this->title       = $title;
        $this->description = $description;
    }

    public function toArray(): array
    {
        return [
            'idApartment' => $this->id->value(),
            'title'        => $this->title->value(),
            'description' => $this->description->value()
        ];
    }

    public static function fromArray(array $array): self
    {
        return new self(
            new ApartmentId($array['apartment_id']),
            new ApartmentCategoryTitle($array['title']),
            new ApartmentCategoryDescription($array['description'])
        );
    }

    public function getApartmentId(): ?ApartmentId
    {
        return $this->id;
    }

    public function getTitle(): ApartmentCategoryTitle
    {
        return $this->title;
    }

    public function getDescription(): ApartmentCategoryDescription
    {
        return $this->description;
    }
}
