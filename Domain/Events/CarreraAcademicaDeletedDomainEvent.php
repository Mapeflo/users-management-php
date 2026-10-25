<?php

declare(strict_types=1);

require_once __DIR__ . '/DomainEvent.php';
require_once __DIR__ . '/../ValueObjects/CarreraAcademicaId.php';

final class CarreraAcademicaDeletedDomainEvent extends DomainEvent
{
    private CarreraAcademicaId $carreraAcademicaId;

    public function __construct(CarreraAcademicaId $carreraAcademicaId)
    {
        parent::__construct('carrera_academica.deleted');
        $this->carreraAcademicaId = $carreraAcademicaId;
    }

    public function carreraAcademicaId(): CarreraAcademicaId
    {
        return $this->carreraAcademicaId;
    }

    public function payload(): array
    {
        return [
            'id' => $this->carreraAcademicaId->value()
        ];
    }
}