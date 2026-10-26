<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../../Application/Ports/In/CreateCarreraAcademicaUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/GetCarreraAcademicaByIdUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/GetAllCarrerasAcademicasUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/UpdateCarreraAcademicaUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/DeleteCarreraAcademicaUseCase.php';
require_once __DIR__ . '/../../../../Application/Services/Dto/Commands/CreateCarreraAcademicaCommand.php';
require_once __DIR__ . '/../../../../Application/Services/Dto/Commands/UpdateCarreraAcademicaCommand.php';
require_once __DIR__ . '/../../../../Application/Services/Dto/Commands/DeleteCarreraAcademicaCommand.php';
require_once __DIR__ . '/../../../../Application/Services/Dto/Queries/GetCarreraAcademicaByIdQuery.php';
require_once __DIR__ . '/../../../../Application/Services/Dto/Queries/GetAllCarrerasAcademicasQuery.php';
require_once __DIR__ . '/../../../../Application/Services/Mappers/CarreraAcademicaApplicationMapper.php';

final class CarreraAcademicaController
{
    private CreateCarreraAcademicaUseCase $createUseCase;
    private GetCarreraAcademicaByIdUseCase $getByIdUseCase;
    private GetAllCarrerasAcademicasUseCase $getAllUseCase;
    private UpdateCarreraAcademicaUseCase $updateUseCase;
    private DeleteCarreraAcademicaUseCase $deleteUseCase;

    public function __construct(
        CreateCarreraAcademicaUseCase $createUseCase,
        GetCarreraAcademicaByIdUseCase $getByIdUseCase,
        GetAllCarrerasAcademicasUseCase $getAllUseCase,
        UpdateCarreraAcademicaUseCase $updateUseCase,
        DeleteCarreraAcademicaUseCase $deleteUseCase
    ) {
        $this->createUseCase = $createUseCase;
        $this->getByIdUseCase = $getByIdUseCase;
        $this->getAllUseCase = $getAllUseCase;
        $this->updateUseCase = $updateUseCase;
        $this->deleteUseCase = $deleteUseCase;
    }

    public function index(): void
    {
        $query = new GetAllCarrerasAcademicasQuery();
        $carreras = $this->getAllUseCase->execute($query);
        $data = CarreraAcademicaApplicationMapper::fromModelsToArray($carreras);

        require __DIR__ . '/../Presentation/carreras_academicas/listar.php';
    }

    public function createForm(): void
    {
        require __DIR__ . '/../Presentation/carreras_academicas/crear.php';
    }

    public function store(): void
    {
        try {
            $command = new CreateCarreraAcademicaCommand(
                $_POST['nombre'] ?? '',
                (int) ($_POST['num_creditos'] ?? 0),
                (int) ($_POST['num_asignaturas'] ?? 0),
                (int) ($_POST['num_semestres'] ?? 0),
                $_POST['nivel_formacion'] ?? '',
                $_POST['titulo'] ?? '',
                (float) ($_POST['valor_semestre'] ?? 0),
                $_POST['universidad'] ?? '',
                isset($_POST['es_acreditada']),
                $_POST['perfiles'] ?? '',
                $_POST['area_conocimiento'] ?? ''
            );

            $this->createUseCase->execute($command);
            header('Location: ?controller=carrera&action=index');
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
            require __DIR__ . '/../Presentation/carreras_academicas/crear.php';
        }
    }

    public function editForm(): void
    {
        $id = $_GET['id'] ?? '';
        $query = new GetCarreraAcademicaByIdQuery($id);
        $carrera = $this->getByIdUseCase->execute($query);
        $data = CarreraAcademicaApplicationMapper::fromModelToArray($carrera);

        require __DIR__ . '/../Presentation/carreras_academicas/editar.php';
    }

    public function update(): void
    {
        try {
            $command = new UpdateCarreraAcademicaCommand(
                $_POST['id'] ?? '',
                $_POST['nombre'] ?? '',
                (int) ($_POST['num_creditos'] ?? 0),
                (int) ($_POST['num_asignaturas'] ?? 0),
                (int) ($_POST['num_semestres'] ?? 0),
                $_POST['nivel_formacion'] ?? '',
                $_POST['titulo'] ?? '',
                (float) ($_POST['valor_semestre'] ?? 0),
                $_POST['universidad'] ?? '',
                isset($_POST['es_acreditada']),
                $_POST['perfiles'] ?? '',
                $_POST['area_conocimiento'] ?? ''
            );

            $this->updateUseCase->execute($command);
            header('Location: ?controller=carrera&action=index');
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
            require __DIR__ . '/../Presentation/carreras_academicas/editar.php';
        }
    }

    public function delete(): void
    {
        $id = $_GET['id'] ?? '';
        $command = new DeleteCarreraAcademicaCommand($id);
        $this->deleteUseCase->execute($command);

        header('Location: ?controller=carrera&action=index');
        exit;
    }
}