<?php

declare(strict_types=1);

class InvalidCarreraAcademicaNumCreditosException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid(int $value): self
    {
        return new self("The number of creditos is invalid: {$value}. Must be greater than 0.");
    }
}