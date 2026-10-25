<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/UpdateCarreraAcademicaUseCase.php';
require_once __DIR__ . '/../Ports/Out/UpdateCarreraAcademicaPort.php';
require_once __DIR__ . '/../Ports/Out/GetCarreraAcademicaByIdPort.php';
require_once __DIR__ . '/Dto/Commands/UpdateCarreraAcademicaCommand.php';
require_once __DIR__ . '/Mappers/CarreraAcademicaApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Models/CarreraAcademicaModel.php';
require_once __DIR__ . '/../../Domain/Exceptions/CarreraAcademicaNotFoundException.php';

final class UpdateCarreraAcademicaService implements UpdateCarreraAcademicaUseCase
{
    private UpdateCarreraAcademicaPort $updatePort;
    private GetCarreraAcademicaByIdPort $getByIdPort;

    public function __construct(
        UpdateCarreraAcademicaPort $updatePort,
        GetCarreraAcademicaByIdPort $getByIdPort
    ) {
        $this->updatePort = $updatePort;
        $this->getByIdPort = $getByIdPort;
    }

    public function execute(UpdateCarreraAcademicaCommand $command): CarreraAcademicaModel
    {
        $id = new \CarreraAcademicaId($command->id());

        $existing = $this->getByIdPort->getById($id);
        if ($existing === null) {
            throw CarreraAcademicaNotFoundException::becauseIdWasNotFound($command->id());
        }

        $carreraAcademica = CarreraAcademicaApplicationMapper::fromUpdateCommandToModel($command);

        return $this->updatePort->update($carreraAcademica);
    }
}