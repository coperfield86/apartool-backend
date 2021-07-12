<?php

declare(strict_types = 1);

namespace Tests\Apartool\Apartment;

use Apartool\Apartment\Application\Create\ApartmentCreator;
use Apartool\Apartment\Application\Delete\ApartmentDeleter;
use Apartool\Apartment\Application\Find\ApartmentFinder;
use Apartool\Apartment\Application\Update\ApartmentUpdater;
use Apartool\Apartment\Domain\ApartmentRepository;
use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;
use Carbon\Carbon;
use Mockery\MockInterface;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentActiveMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentDescriptionMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentIdMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentNameMother;
use Tests\Apartool\Apartment\Domain\ValueObjects\ApartmentQuantityMother;
use Tests\TestCase;

abstract class ApartmentUnitTestCase extends TestCase
{
    protected function shouldSave(ApartmentName $name,
                                  ApartmentDescription $description,
                                  ApartmentQuantity $quantity,
                                  ApartmentActive $active) {
        $mock = $this->repository();

        $mock->shouldReceive('save')
            ->once()
            ->andReturnTrue();
        $this->creator = new ApartmentCreator($mock);
        $this->creator->invoke(
            $name,
            $description,
            $quantity,
            $active
        );
    }

    protected function shouldUpdate() {
        $mock = $this->repository();
        $mock->shouldReceive('update')
            ->once()
            ->andReturnTrue();
        $finder = $this->finderRepository();
        $updater= new ApartmentUpdater($finder, $mock);
        $updater->invoke(
            ApartmentIdMother::random(),
            ApartmentNameMother::random(),
            ApartmentDescriptionMother::random(),
            ApartmentQuantityMother::random(),
            ApartmentActiveMother::random()
        );
    }

    protected function shouldFind(ApartmentId $id) {
        $finder = $this->finderRepository();
        $finder->invoke($id);
    }

    protected function shouldDelete(ApartmentId $id) {
        $mock = $this->repository();
        $mock->shouldReceive('delete')
            ->once()
            ->andReturnTrue();
        $deleter = new ApartmentDeleter($mock);
        $deleter->invoke($id);
    }

    protected function repository(): MockInterface
    {
        return $this->mock(ApartmentRepository::class);
    }

    private function finderRepository() {
        $mock = $this->repository();
        $databaseRow = [
            'id' => 1,
            'name' => 'Aparment',
            'description' => 'Aparment',
            'quantity' =>  5,
            'active' => 1,
            'created_at' => Carbon::now()->toString(),
        ];
        $mock->shouldReceive('find')
            ->once()
            ->andReturn($databaseRow);
        return new ApartmentFinder($mock);
    }
}
