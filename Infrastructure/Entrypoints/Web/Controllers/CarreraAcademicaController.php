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
require_once __DIR__ . '/../Presentation/View.php';
require_once __DIR__ . '/../Presentation/Flash.php';

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

        View::render('carreras_academicas/listar', [
            'pageTitle' => 'Carreras Académicas',
            'carreras'  => $data,
            'message'   => Flash::message(),
            'success'   => Flash::success(),
        ]);
    }

    public function createForm(): void
    {
        View::render('carreras_academicas/crear', [
            'pageTitle' => 'Nueva Carrera Académica',
            'message'   => Flash::message(),
            'errors'    => Flash::errors(),
            'old'       => Flash::old(),
        ]);
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

            Flash::setSuccess('Carrera académica registrada correctamente.');
            View::redirect('carreras.index');
        } catch (Throwable $e) {
            Flash::setMessage($e->getMessage());
            Flash::setOld($_POST);
            View::redirect('carreras.create');
        }
    }

    public function editForm(): void
    {
        try {
            $id = $_GET['id'] ?? '';
            $query = new GetCarreraAcademicaByIdQuery($id);
            $carrera = $this->getByIdUseCase->execute($query);
            $data = CarreraAcademicaApplicationMapper::fromModelToArray($carrera);

            View::render('carreras_academicas/editar', [
                'pageTitle' => 'Editar Carrera Académica',
                'carrera'   => $data,
                'message'   => Flash::message(),
                'errors'    => Flash::errors(),
                'old'       => Flash::old(),
            ]);
        } catch (Throwable $e) {
            Flash::setMessage($e->getMessage());
            View::redirect('carreras.index');
        }
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

            Flash::setSuccess('Carrera académica actualizada correctamente.');
            View::redirect('carreras.index');
        } catch (Throwable $e) {
            Flash::setMessage($e->getMessage());
            Flash::setOld($_POST);
            header('Location: ?route=carreras.edit&id=' . urlencode($_POST['id'] ?? ''));
            exit;
        }
    }

    public function delete(): void
    {
        try {
            $id = $_POST['id'] ?? ($_GET['id'] ?? '');
            $command = new DeleteCarreraAcademicaCommand($id);
            $this->deleteUseCase->execute($command);

            Flash::setSuccess('Carrera académica eliminada correctamente.');
        } catch (Throwable $e) {
            Flash::setMessage($e->getMessage());
        }

        View::redirect('carreras.index');
    }
}