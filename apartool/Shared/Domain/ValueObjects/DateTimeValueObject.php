<?php

declare(strict_types = 1);

namespace Apartool\Shared\Domain\ValueObjects;

abstract class DateTimeValueObject
{
    protected $value;

    public function __construct(\DateTime $value)
    {
        $this->value = $value;
    }

    public function value(): \DateTime
    {
        return $this->value;
    }

    public function __toString()
    {
        return (string) $this->value();
    }
}
