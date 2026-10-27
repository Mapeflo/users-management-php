<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../../../Application/Ports/Out/SaveCarreraAcademicaPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/GetCarreraAcademicaByIdPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/GetAllCarrerasAcademicasPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/UpdateCarreraAcademicaPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/DeleteCarreraAcademicaPort.php';
require_once __DIR__ . '/../Entity/CarreraAcademicaEntity.php';
require_once __DIR__ . '/../Mapper/CarreraAcademicaMapper.php';
require_once __DIR__ . '/../../../../../Domain/Models/CarreraAcademicaModel.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/CarreraAcademicaId.php';

final class CarreraAcademicaMySQLRepository implements
    SaveCarreraAcademicaPort,
    GetCarreraAcademicaByIdPort,
    GetAllCarrerasAcademicasPort,
    UpdateCarreraAcademicaPort,
    DeleteCarreraAcademicaPort
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(CarreraAcademicaModel $carreraAcademica): CarreraAcademicaModel
    {
        $entity = CarreraAcademicaMapper::toEntity($carreraAcademica);

        $sql = "INSERT INTO carreras_academicas
                (id, nombre, num_creditos, num_asignaturas, num_semestres, nivel_formacion,
                 titulo, valor_semestre, universidad, es_acreditada, perfiles, area_conocimiento)
                VALUES
                (:id, :nombre, :num_creditos, :num_asignaturas, :num_semestres, :nivel_formacion,
                 :titulo, :valor_semestre, :universidad, :es_acreditada, :perfiles, :area_conocimiento)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $entity->id,
            ':nombre' => $entity->nombre,
            ':num_creditos' => $entity->num_creditos,
            ':num_asignaturas' => $entity->num_asignaturas,
            ':num_semestres' => $entity->num_semestres,
            ':nivel_formacion' => $entity->nivel_formacion,
            ':titulo' => $entity->titulo,
            ':valor_semestre' => $entity->valor_semestre,
            ':universidad' => $entity->universidad,
            ':es_acreditada' => $entity->es_acreditada,
            ':perfiles' => $entity->perfiles,
            ':area_conocimiento' => $entity->area_conocimiento,
        ]);

        return $carreraAcademica;
    }

    public function getById(CarreraAcademicaId $id): ?CarreraAcademicaModel
    {
        $sql = "SELECT * FROM carreras_academicas WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id->value()]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        $entity = $this->mapRowToEntity($row);
        return CarreraAcademicaMapper::toModel($entity);
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM carreras_academicas ORDER BY nombre ASC";
        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $entities = [];
        foreach ($rows as $row) {
            $entities[] = $this->mapRowToEntity($row);
        }

        return CarreraAcademicaMapper::toModelList($entities);
    }

    public function update(CarreraAcademicaModel $carreraAcademica): CarreraAcademicaModel
    {
        $entity = CarreraAcademicaMapper::toEntity($carreraAcademica);

        $sql = "UPDATE carreras_academicas SET
                    nombre = :nombre,
                    num_creditos = :num_creditos,
                    num_asignaturas = :num_asignaturas,
                    num_semestres = :num_semestres,
                    nivel_formacion = :nivel_formacion,
                    titulo = :titulo,
                    valor_semestre = :valor_semestre,
                    universidad = :universidad,
                    es_acreditada = :es_acreditada,
                    perfiles = :perfiles,
                    area_conocimiento = :area_conocimiento
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $entity->id,
            ':nombre' => $entity->nombre,
            ':num_creditos' => $entity->num_creditos,
            ':num_asignaturas' => $entity->num_asignaturas,
            ':num_semestres' => $entity->num_semestres,
            ':nivel_formacion' => $entity->nivel_formacion,
            ':titulo' => $entity->titulo,
            ':valor_semestre' => $entity->valor_semestre,
            ':universidad' => $entity->universidad,
            ':es_acreditada' => $entity->es_acreditada,
            ':perfiles' => $entity->perfiles,
            ':area_conocimiento' => $entity->area_conocimiento,
        ]);

        return $carreraAcademica;
    }

    public function delete(CarreraAcademicaId $id): void
    {
        $sql = "DELETE FROM carreras_academicas WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id->value()]);
    }

    private function mapRowToEntity(array $row): CarreraAcademicaEntity
    {
        return new CarreraAcademicaEntity(
            $row['id'],
            $row['nombre'],
            (int) $row['num_creditos'],
            (int) $row['num_asignaturas'],
            (int) $row['num_semestres'],
            $row['nivel_formacion'],
            $row['titulo'],
            (float) $row['valor_semestre'],
            $row['universidad'],
            (int) $row['es_acreditada'],
            $row['perfiles'],
            $row['area_conocimiento']
        );
    }
}