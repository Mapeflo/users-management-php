<?php

declare(strict_types=1);

class InvalidCarreraAcademicaValorSemestreException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid(float $value): self
    {
        return new self("The valor del semestre is invalid: {$value}. Must be greater than or equal to 0.");
    }
}