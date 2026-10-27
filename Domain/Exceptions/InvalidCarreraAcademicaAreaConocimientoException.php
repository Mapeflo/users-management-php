<?php

declare(strict_types=1);

class InvalidCarreraAcademicaAreaConocimientoException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('The area de conocimiento must not be empty.');
    }
}