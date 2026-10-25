<?php

declare(strict_types=1);

require_once __DIR__ . '/../Dto/Commands/CreateCarreraAcademicaCommand.php';
require_once __DIR__ . '/../Dto/Commands/UpdateCarreraAcademicaCommand.php';
require_once __DIR__ . '/../Dto/Commands/DeleteCarreraAcademicaCommand.php';
require_once __DIR__ . '/../Dto/Queries/GetCarreraAcademicaByIdQuery.php';
require_once __DIR__ . '/../../../Domain/Models/CarreraAcademicaModel.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaId.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaNombre.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaNumCreditos.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaNumAsignaturas.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaNumSemestres.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaNivelFormacion.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaTitulo.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaValorSemestre.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaUniversidad.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaEsAcreditada.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/CarreraAcademicaAreaConocimiento.php';

final class CarreraAcademicaApplicationMapper
{
    public static function fromCreateCommandToModel(
        CreateCarreraAcademicaCommand $command,
        string $generatedId
    ): CarreraAcademicaModel {
        return CarreraAcademicaModel::create(
            new CarreraAcademicaId($generatedId),
            new CarreraAcademicaNombre($command->nombre()),
            new CarreraAcademicaNumCreditos($command->numCreditos()),
            new CarreraAcademicaNumAsignaturas($command->numAsignaturas()),
            new CarreraAcademicaNumSemestres($command->numSemestres()),
            new CarreraAcademicaNivelFormacion($command->nivelFormacion()),
            new CarreraAcademicaTitulo($command->titulo()),
            new CarreraAcademicaValorSemestre($command->valorSemestre()),
            new CarreraAcademicaUniversidad($command->universidad()),
            new CarreraAcademicaEsAcreditada($command->esAcreditada()),
            $command->perfiles(),
            new CarreraAcademicaAreaConocimiento($command->areaConocimiento())
        );
    }

    public static function fromUpdateCommandToModel(UpdateCarreraAcademicaCommand $command): CarreraAcademicaModel
    {
        return new CarreraAcademicaModel(
            new CarreraAcademicaId($command->id()),
            new CarreraAcademicaNombre($command->nombre()),
            new CarreraAcademicaNumCreditos($command->numCreditos()),
            new CarreraAcademicaNumAsignaturas($command->numAsignaturas()),
            new CarreraAcademicaNumSemestres($command->numSemestres()),
            new CarreraAcademicaNivelFormacion($command->nivelFormacion()),
            new CarreraAcademicaTitulo($command->titulo()),
            new CarreraAcademicaValorSemestre($command->valorSemestre()),
            new CarreraAcademicaUniversidad($command->universidad()),
            new CarreraAcademicaEsAcreditada($command->esAcreditada()),
            $command->perfiles(),
            new CarreraAcademicaAreaConocimiento($command->areaConocimiento())
        );
    }

    public static function fromGetByIdQueryToId(GetCarreraAcademicaByIdQuery $query): CarreraAcademicaId
    {
        return new CarreraAcademicaId($query->id());
    }

    public static function fromDeleteCommandToId(DeleteCarreraAcademicaCommand $command): CarreraAcademicaId
    {
        return new CarreraAcademicaId($command->id());
    }

    public static function fromModelToArray(CarreraAcademicaModel $model): array
    {
        return $model->toArray();
    }

    /**
     * @param CarreraAcademicaModel[] $models
     * @return array
     */
    public static function fromModelsToArray(array $models): array
    {
        $result = [];
        foreach ($models as $model) {
            $result[] = self::fromModelToArray($model);
        }
        return $result;
    }
}