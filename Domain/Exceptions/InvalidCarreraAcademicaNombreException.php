<?php

declare(strict_types=1);

class InvalidCarreraAcademicaNombreException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('The carrera academica nombre must not be empty.');
    }

    public static function becauseLengthIsTooShort(int $minLength): self
    {
        return new self("The carrera academica nombre must contain at least {$minLength} characters.");
    }
}