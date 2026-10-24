<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCarreraAcademicaNumSemestresException.php';

final class CarreraAcademicaNumSemestres
{
    private int $value;

    public function __construct(int $value)
    {
        if ($value <= 0) {
            throw InvalidCarreraAcademicaNumSemestresException::becauseValueIsInvalid($value);
        }

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(CarreraAcademicaNumSemestres $other): bool
    {
        return $this->value === $other->value();
    }
}