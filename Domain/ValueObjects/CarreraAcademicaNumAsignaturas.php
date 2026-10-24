<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCarreraAcademicaNumAsignaturasException.php';

final class CarreraAcademicaNumAsignaturas
{
    private int $value;

    public function __construct(int $value)
    {
        if ($value <= 0) {
            throw InvalidCarreraAcademicaNumAsignaturasException::becauseValueIsInvalid($value);
        }

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(CarreraAcademicaNumAsignaturas $other): bool
    {
        return $this->value === $other->value();
    }
}