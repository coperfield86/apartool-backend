<?php


namespace Apartool\Apartment\Domain;


use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Apartment\Domain\ValueObjects\ApartmentCreatedAt;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDeletedAt;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;
use Apartool\Apartment\Domain\ValueObjects\ApartmentUpdatedAt;

class ApartmentEntity {
    private $id;
    private $name;
    private $description;
    private $quantity;
    private $active;
    private $createdAt;
    private $updatedAt;
    private $deletedAt;

    /**
     * ApartmentEntity constructor.
     * @param ApartmentId $id
     * @param ApartmentName $name
     * @param ApartmentDescription $description
     * @param ApartmentQuantity $quantity
     * @param ApartmentActive $active
     * @param ?ApartmentCreatedAt $createdAt
     * @param ?ApartmentUpdatedAt $updatedAt
     * @param ?ApartmentDeletedAt $deletedAt
     */
    public function __construct(
        ApartmentName $name,
        ApartmentDescription $description,
        ApartmentQuantity $quantity,
        ApartmentActive $active,
        ?ApartmentCreatedAt $createdAt,
        ?ApartmentUpdatedAt $updatedAt,
        ?ApartmentDeletedAt $deletedAt)
    {
        $this->name          = $name;
        $this->description   = $description;
        $this->quantity      = $quantity;
        $this->active        = $active;
        $this->createdAt     = $createdAt;
        $this->updatedAt     = $updatedAt;
        $this->deletedAt     = $deletedAt;
    }

    /**
     * @return ApartmentId
     */
    public function getId(): ApartmentId
    {
        return $this->id;
    }

    /**
     * @return ApartmentName
     */
    public function getName(): ApartmentName
    {
        return $this->name;
    }

    /**
     * @return ApartmentDescription
     */
    public function getDescription(): ApartmentDescription
    {
        return $this->description;
    }

    /**
     * @return ApartmentQuantity
     */
    public function getQuantity(): ApartmentQuantity
    {
        return $this->quantity;
    }

    /**
     * @return ApartmentActive
     */
    public function getActive(): ApartmentActive
    {
        return $this->active;
    }

    /**
     * @return ApartmentCreatedAt
     */
    public function getCreatedAt(): ApartmentCreatedAt
    {
        return $this->createdAt;
    }

    /**
     * @return ApartmentUpdatedAt
     */
    public function getUpdatedAt(): ApartmentUpdatedAt
    {
        return $this->updatedAt;
    }

    /**
     * @return ApartmentDeletedAt
     */
    public function getDeletedAt(): ApartmentDeletedAt
    {
        return $this->deletedAt;
    }

    public static function fromArray(array|null $apartment): self|null
    {
        if ($apartment) {
            return new self(
                new ApartmentId($apartment['id']),
                new ApartmentName($apartment['name']),
                new ApartmentDescription($apartment['description']),
                new ApartmentQuantity($apartment['quantity']),
                new ApartmentActive($apartment['active']),
                ApartmentCreatedAt::factoryWithString($apartment['created_at']),
                ApartmentUpdatedAt::factoryWithString($apartment['updated_at']),
                ApartmentDeletedAt::factoryWithString($apartment['deleted_at'])
            );
        } else {
            return null;
        }
    }

    /**
     * @param ApartmentId $id
     * @param ApartmentName $name
     * @param ApartmentDescription $description
     * @param ApartmentQuantity $quantity
     * @param ApartmentActive $active
     * @param ApartmentCreatedAt $createdAt
     * @param ApartmentUpdatedAt $updatedAt
     * @param ApartmentDeletedAt $deletedAt
     * @return ApartmentEntity
     */
    public static function create(
        ApartmentName $name,
        ApartmentDescription $description,
        ApartmentQuantity $quantity,
        ApartmentActive $active,
        ApartmentCreatedAt $createdAt,
        ApartmentUpdatedAt $updatedAt,
        ApartmentDeletedAt $deletedAt): ApartmentEntity {
        return new self($name, $description, $quantity, $active, $createdAt, $updatedAt, $deletedAt);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->getValue(),
            'name' => $this->name->getValue(),
            'description' => $this->description->getValue(),
            'quantity' => $this->quantity->getValue(),
            'active' => $this->active->getValue(),
            'created_at' => $this->createdAt->getValue(),
            'updated_at' => $this->updatedAt->getValue()
        ];
    }
}
