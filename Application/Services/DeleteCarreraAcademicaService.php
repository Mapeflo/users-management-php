<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/DeleteCarreraAcademicaUseCase.php';
require_once __DIR__ . '/../Ports/Out/DeleteCarreraAcademicaPort.php';
require_once __DIR__ . '/../Ports/Out/GetCarreraAcademicaByIdPort.php';
require_once __DIR__ . '/Dto/Commands/DeleteCarreraAcademicaCommand.php';
require_once __DIR__ . '/Mappers/CarreraAcademicaApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/CarreraAcademicaNotFoundException.php';

final class DeleteCarreraAcademicaService implements DeleteCarreraAcademicaUseCase
{
    private DeleteCarreraAcademicaPort $deletePort;
    private GetCarreraAcademicaByIdPort $getByIdPort;

    public function __construct(
        DeleteCarreraAcademicaPort $deletePort,
        GetCarreraAcademicaByIdPort $getByIdPort
    ) {
        $this->deletePort = $deletePort;
        $this->getByIdPort = $getByIdPort;
    }

    public function execute(DeleteCarreraAcademicaCommand $command): void
    {
        $id = CarreraAcademicaApplicationMapper::fromDeleteCommandToId($command);

        $existing = $this->getByIdPort->getById($id);
        if ($existing === null) {
            throw CarreraAcademicaNotFoundException::becauseIdWasNotFound($command->id());
        }

        $this->deletePort->delete($id);
    }
}