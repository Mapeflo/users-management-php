<?php

declare(strict_types=1);

final class CarreraAcademicaEsAcreditada
{
    private bool $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function value(): bool
    {
        return $this->value;
    }

    public function equals(CarreraAcademicaEsAcreditada $other): bool
    {
        return $this->value === $other->value();
    }
}