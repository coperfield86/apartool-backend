<?php

declare(strict_types = 1);

namespace Tests\Apartool\Apartment;

use Apartool\Apartment\Application\Create\ApartmentCreator;
use Apartool\Apartment\Application\Find\ApartmentFinder;
use Apartool\Apartment\Application\Update\ApartmentUpdater;
use Apartool\Apartment\Domain\Apartment;
use Apartool\Apartment\Domain\ApartmentRepository;
use Apartool\Apartment\Domain\ValueObjects\ApartmentActive;
use Apartool\Apartment\Domain\ValueObjects\ApartmentDescription;
use Apartool\Apartment\Domain\ValueObjects\ApartmentId;
use Apartool\Apartment\Domain\ValueObjects\ApartmentName;
use Apartool\Apartment\Domain\ValueObjects\ApartmentQuantity;
use Mockery\MockInterface;
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

    /*protected function shouldUpdate(ApartmentId $id,
                                    ApartmentName $name,
                                    ApartmentDescription $description,
                                    ApartmentQuantity $quantity,
                                    ApartmentActive $active) {
        $mock = $this->repository();
        $mock->shouldReceive('update')
            ->once()
            ->andReturnTrue();
        $updater= new ApartmentUpdater($mock);
        $updater->invoke(
            $id,
            $name,
            $description,
            $quantity,
            $active
        );
    }*/

    protected function shouldSearch(ApartmentId $id) {
        $mock = $this->repository();
        $mock->shouldReceive('find')
            ->once()
            ->andReturn(array());
        $finder = new ApartmentFinder($mock);
        $finder->invoke($id);
    }

    protected function repository(): MockInterface
    {
        return $this->mock(ApartmentRepository::class);
    }
}
