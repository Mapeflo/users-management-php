<?php

declare(strict_types=1);

class CarreraAcademicaAlreadyExistsException extends DomainException
{
    public static function becauseNombreAlreadyExists(string $nombre): self
    {
        return new self("A carrera academica with nombre {$nombre} already exists.");
    }
}