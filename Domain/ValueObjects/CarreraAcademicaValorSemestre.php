<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCarreraAcademicaValorSemestreException.php';

final class CarreraAcademicaValorSemestre
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value < 0) {
            throw InvalidCarreraAcademicaValorSemestreException::becauseValueIsInvalid($value);
        }

        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }

    public function equals(CarreraAcademicaValorSemestre $other): bool
    {
        return $this->value === $other->value();
    }
}