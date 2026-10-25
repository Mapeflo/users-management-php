<?php

declare(strict_types=1);

require_once __DIR__ . '/../Entity/CarreraAcademicaEntity.php';
require_once __DIR__ . '/../../../../Domain/Models/CarreraAcademicaModel.php';
require_once __DIR__ . '/../../../../Domain/ValueObjects/CarreraAcademicaId.php';
require_once __DIR__ . '/../../../../Domain/ValueObjects/CarreraAcademicaNombre.php';
require_once __DIR__ . '/../../../../Domain/ValueObjects/CarreraAcademicaNumCreditos.php';
require_once __DIR__ . '/../../../../Domain/ValueObjects/CarreraAcademicaNumAsignaturas.php';
require_once __DIR__ . '/../../../../Domain/ValueObjects/CarreraAcademicaNumSemestres.php';
require_once __DIR__ . '/../../../../Domain/ValueObjects/CarreraAcademicaNivelFormacion.php';
require_once __DIR__ . '/../../../../Domain/ValueObjects/CarreraAcademicaTitulo.php';
require_once __DIR__ . '/../../../../Domain/ValueObjects/CarreraAcademicaValorSemestre.php';
require_once __DIR__ . '/../../../../Domain/ValueObjects/CarreraAcademicaUniversidad.php';
require_once __DIR__ . '/../../../../Domain/ValueObjects/CarreraAcademicaEsAcreditada.php';
require_once __DIR__ . '/../../../../Domain/ValueObjects/CarreraAcademicaAreaConocimiento.php';

final class CarreraAcademicaMapper
{
    public static function toEntity(CarreraAcademicaModel $model): CarreraAcademicaEntity
    {
        return new CarreraAcademicaEntity(
            $model->id()->value(),
            $model->nombre()->value(),
            $model->numCreditos()->value(),
            $model->numAsignaturas()->value(),
            $model->numSemestres()->value(),
            $model->nivelFormacion()->value(),
            $model->titulo()->value(),
            $model->valorSemestre()->value(),
            $model->universidad()->value(),
            $model->esAcreditada()->value() ? 1 : 0,
            $model->perfiles(),
            $model->areaConocimiento()->value()
        );
    }

    public static function toModel(CarreraAcademicaEntity $entity): CarreraAcademicaModel
    {
        return new CarreraAcademicaModel(
            new CarreraAcademicaId($entity->id),
            new CarreraAcademicaNombre($entity->nombre),
            new CarreraAcademicaNumCreditos($entity->num_creditos),
            new CarreraAcademicaNumAsignaturas($entity->num_asignaturas),
            new CarreraAcademicaNumSemestres($entity->num_semestres),
            new CarreraAcademicaNivelFormacion($entity->nivel_formacion),
            new CarreraAcademicaTitulo($entity->titulo),
            new CarreraAcademicaValorSemestre((float) $entity->valor_semestre),
            new CarreraAcademicaUniversidad($entity->universidad),
            new CarreraAcademicaEsAcreditada((bool) $entity->es_acreditada),
            $entity->perfiles ?? '',
            new CarreraAcademicaAreaConocimiento($entity->area_conocimiento)
        );
    }

    /**
     * @param CarreraAcademicaEntity[] $entities
     * @return CarreraAcademicaModel[]
     */
    public static function toModelList(array $entities): array
    {
        $models = [];
        foreach ($entities as $entity) {
            $models[] = self::toModel($entity);
        }
        return $models;
    }
}

