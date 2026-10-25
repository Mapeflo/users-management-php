<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetCarreraAcademicaByIdUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetCarreraAcademicaByIdPort.php';
require_once __DIR__ . '/Dto/Queries/GetCarreraAcademicaByIdQuery.php';
require_once __DIR__ . '/Mappers/CarreraAcademicaApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Models/CarreraAcademicaModel.php';
require_once __DIR__ . '/../../Domain/Exceptions/CarreraAcademicaNotFoundException.php';

final class GetCarreraAcademicaByIdService implements GetCarreraAcademicaByIdUseCase
{
    private GetCarreraAcademicaByIdPort $getByIdPort;

    public function __construct(GetCarreraAcademicaByIdPort $getByIdPort)
    {
        $this->getByIdPort = $getByIdPort;
    }

    public function execute(GetCarreraAcademicaByIdQuery $query): CarreraAcademicaModel
    {
        $id = CarreraAcademicaApplicationMapper::fromGetByIdQueryToId($query);

        $carreraAcademica = $this->getByIdPort->getById($id);

        if ($carreraAcademica === null) {
            throw CarreraAcademicaNotFoundException::becauseIdWasNotFound($id->value());
        }

        return $carreraAcademica;
    }
}