<?php

declare(strict_types=1);

require_once __DIR__ . '/DomainEvent.php';
require_once __DIR__ . '/../Models/CarreraAcademicaModel.php';

final class CarreraAcademicaCreatedDomainEvent extends DomainEvent
{
    private CarreraAcademicaModel $carreraAcademica;

    public function __construct(CarreraAcademicaModel $carreraAcademica)
    {
        parent::__construct('carrera_academica.created');
        $this->carreraAcademica = $carreraAcademica;
    }

    public function carreraAcademica(): CarreraAcademicaModel
    {
        return $this->carreraAcademica;
    }

    public function payload(): array
    {
        return $this->carreraAcademica->toArray();
    }
}