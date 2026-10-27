<?php

declare(strict_types=1);

class InvalidCarreraAcademicaUniversidadException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('The universidad must not be empty.');
    }
}