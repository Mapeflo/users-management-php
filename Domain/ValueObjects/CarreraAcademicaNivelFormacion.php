<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCarreraAcademicaNivelFormacionException.php';
require_once __DIR__ . '/../Enums/NivelFormacionEnum.php';

final class CarreraAcademicaNivelFormacion
{
    private string $value;

    public function __construct(string $value)
    {
        $normalizedValue = strtoupper(trim($value));

        if ($normalizedValue === '') {
            throw InvalidCarreraAcademicaNivelFormacionException::becauseValueIsEmpty();
        }

        NivelFormacionEnum::ensureIsValid($normalizedValue);

        $this->value = $normalizedValue;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(CarreraAcademicaNivelFormacion $other): bool
    {
        return $this->value === $other->value();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}