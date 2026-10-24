<?php

declare(strict_types=1);

class InvalidCarreraAcademicaNumAsignaturasException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid(int $value): self
    {
        return new self("The number of asignaturas is invalid: {$value}. Must be greater than 0.");
    }
}