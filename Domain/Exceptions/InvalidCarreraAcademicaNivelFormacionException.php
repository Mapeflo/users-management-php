<?php

declare(strict_types=1);

class InvalidCarreraAcademicaNivelFormacionException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('The nivel de formacion must not be empty.');
    }

    public static function becauseValueIsInvalid(string $value): self
    {
        return new self("The nivel de formacion is invalid: {$value}");
    }
}