<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetAllCarrerasAcademicasUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetAllCarrerasAcademicasPort.php';
require_once __DIR__ . '/Dto/Queries/GetAllCarrerasAcademicasQuery.php';
require_once __DIR__ . '/../../Domain/Models/CarreraAcademicaModel.php';

final class GetAllCarrerasAcademicasService implements GetAllCarrerasAcademicasUseCase
{
    private GetAllCarrerasAcademicasPort $getAllPort;

    public function __construct(GetAllCarrerasAcademicasPort $getAllPort)
    {
        $this->getAllPort = $getAllPort;
    }

    public function execute(GetAllCarrerasAcademicasQuery $query): array
    {
        return $this->getAllPort->getAll();
    }
}