<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCarreraAcademicaNumCreditosException.php';

final class CarreraAcademicaNumCreditos
{
    private int $value;

    public function __construct(int $value)
    {
        if ($value <= 0) {
            throw InvalidCarreraAcademicaNumCreditosException::becauseValueIsInvalid($value);
        }

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(CarreraAcademicaNumCreditos $other): bool
    {
        return $this->value === $other->value();
    }
}

