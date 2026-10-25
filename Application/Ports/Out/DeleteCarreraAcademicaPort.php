<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaId.php';

interface DeleteCarreraAcademicaPort
{
    public function delete(CarreraAcademicaId $id): void;
}