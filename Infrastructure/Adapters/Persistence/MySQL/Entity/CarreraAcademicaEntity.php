<?php

declare(strict_types=1);

final class CarreraAcademicaEntity
{
    public string $id;
    public string $nombre;
    public int $num_creditos;
    public int $num_asignaturas;
    public int $num_semestres;
    public string $nivel_formacion;
    public string $titulo;
    public float $valor_semestre;
    public string $universidad;
    public int $es_acreditada; // 0 o 1
    public ?string $perfiles;
    public string $area_conocimiento;

    public function __construct(
        string $id,
        string $nombre,
        int $num_creditos,
        int $num_asignaturas,
        int $num_semestres,
        string $nivel_formacion,
        string $titulo,
        float $valor_semestre,
        string $universidad,
        int $es_acreditada,
        ?string $perfiles,
        string $area_conocimiento
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->num_creditos = $num_creditos;
        $this->num_asignaturas = $num_asignaturas;
        $this->num_semestres = $num_semestres;
        $this->nivel_formacion = $nivel_formacion;
        $this->titulo = $titulo;
        $this->valor_semestre = $valor_semestre;
        $this->universidad = $universidad;
        $this->es_acreditada = $es_acreditada;
        $this->perfiles = $perfiles;
        $this->area_conocimiento = $area_conocimiento;
    }
}
