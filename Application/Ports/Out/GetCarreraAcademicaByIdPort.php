<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/CarreraAcademicaModel.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaId.php';

interface GetCarreraAcademicaByIdPort
{
    public function getById(CarreraAcademicaId $id): ?CarreraAcademicaModel;
}