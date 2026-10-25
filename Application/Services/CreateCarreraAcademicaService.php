<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/CreateCarreraAcademicaUseCase.php';
require_once __DIR__ . '/../Ports/Out/SaveCarreraAcademicaPort.php';
require_once __DIR__ . '/../Ports/Out/GetCarreraAcademicaByIdPort.php';
require_once __DIR__ . '/Dto/Commands/CreateCarreraAcademicaCommand.php';
require_once __DIR__ . '/Mappers/CarreraAcademicaApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Models/CarreraAcademicaModel.php';
require_once __DIR__ . '/../../Domain/Exceptions/CarreraAcademicaAlreadyExistsException.php';

final class CreateCarreraAcademicaService implements CreateCarreraAcademicaUseCase
{
    private SaveCarreraAcademicaPort $savePort;

    public function __construct(SaveCarreraAcademicaPort $savePort)
    {
        $this->savePort = $savePort;
    }

    public function execute(CreateCarreraAcademicaCommand $command): CarreraAcademicaModel
    {
        // Generamos un ID simple
        $generatedId = uniqid('ca_', true);

        $carreraAcademica = CarreraAcademicaApplicationMapper::fromCreateCommandToModel(
            $command,
            $generatedId
        );

        return $this->savePort->save($carreraAcademica);
    }
}

