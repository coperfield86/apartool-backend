<?php

declare(strict_types = 1);

namespace Apartool\Apartment\Domain;

use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Apartment\Domain\ValueObjects\ApartmentCreatedAt;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;

final class Apartment
{
    private ?ApartmentId $id;
    private ApartmentName $name;
    private ApartmentDescription $description;
    private ApartmentQuantity $quantity;
    private ApartmentActive $active;
    private ?ApartmentCreatedAt $createdAt;

    public function __construct(
        ?ApartmentId $id,
        ApartmentName $name,
        ApartmentDescription $description,
        ApartmentQuantity $quantity,
        ApartmentActive $active,
        ?ApartmentCreatedAt $createdAt) {
        $this->id          = $id;
        $this->name        = $name;
        $this->description = $description;
        $this->quantity    = $quantity;
        $this->active      = $active;
        $this->createdAt   = $createdAt;
    }

   /* public static function create(
        ApartmentName $name,
        ApartmentDescription $description,
        ApartmentQuantity $quantity,
        ApartmentActive $active): self
    {
        return new self($name, $description, $quantity, $active);
    }*/

    public function toArray(): array
    {
        return [
            'id'          => $this->id->value(),
            'name'        => $this->name->value(),
            'description' => $this->description->value(),
            'quantity'    => $this->quantity->value(),
            'active'      => $this->active->value(),
            'createdAt'   => $this->createdAt->value(),
        ];
    }

    public static function fromArray(array $array): self
    {
        return new self(
            new ApartmentId($array['id']),
            new ApartmentName($array['name']),
            new ApartmentDescription($array['description']),
            new ApartmentQuantity($array['quantity']),
            new ApartmentActive($array['active']),
            new ApartmentCreatedAt($array['created_at'])
        );
    }

    public function getId(): ApartmentId
    {
        return $this->id;
    }

    public function getCreatedAt(): ApartmentCreatedAt
    {
        return $this->createdAt;
    }

    public function getName(): ApartmentName
    {
        return $this->name;
    }

    public function getDescription(): ApartmentDescription
    {
        return $this->description;
    }

    public function getQuantity(): ApartmentQuantity
    {
        return $this->quantity;
    }

    public function getActive(): ApartmentActive
    {
        return $this->active;
    }
}
