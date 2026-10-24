<?php

declare(strict_types=1);

class InvalidCarreraAcademicaIdException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('The carrera academica id must not be empty.');
    }
}