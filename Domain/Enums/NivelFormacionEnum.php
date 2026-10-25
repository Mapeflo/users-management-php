<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exceptions/InvalidCarreraAcademicaNivelFormacionException.php';

final class NivelFormacionEnum
{
    public const TECNICO = 'TECNICO';
    public const TECNOLOGO = 'TECNOLOGO';
    public const PROFESIONAL = 'PROFESIONAL';
    public const ESPECIALIZACION = 'ESPECIALIZACION';
    public const MAESTRIA = 'MAESTRIA';
    public const DOCTORADO = 'DOCTORADO';

    public static function values(): array
    {
        return [
            self::TECNICO,
            self::TECNOLOGO,
            self::PROFESIONAL,
            self::ESPECIALIZACION,
            self::MAESTRIA,
            self::DOCTORADO,
        ];
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::values(), true);
    }

    public static function ensureIsValid(string $value): void
    {
        if (!self::isValid($value)) {
            throw InvalidCarreraAcademicaNivelFormacionException::becauseValueIsInvalid($value);
        }
    }
}

