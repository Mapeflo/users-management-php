<?php

declare(strict_types=1);

class InvalidCarreraAcademicaTituloException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('The titulo must not be empty.');
    }

    public static function becauseLengthIsTooShort(int $minLength): self
    {
        return new self("The titulo must contain at least {$minLength} characters.");
    }
}