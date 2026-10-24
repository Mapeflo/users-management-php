<?php

declare(strict_types=1);

class CarreraAcademicaNotFoundException extends DomainException
{
    public static function becauseIdWasNotFound(string $id): self
    {
        return new self("The carrera academica with id {$id} was not found.");
    }
}