<?php

declare(strict_types=1);

require_once __DIR__ . '/../ValueObjects/CarreraAcademicaId.php';
require_once __DIR__ . '/../ValueObjects/CarreraAcademicaNombre.php';
require_once __DIR__ . '/../ValueObjects/CarreraAcademicaNumCreditos.php';
require_once __DIR__ . '/../ValueObjects/CarreraAcademicaNumAsignaturas.php';
require_once __DIR__ . '/../ValueObjects/CarreraAcademicaNumSemestres.php';
require_once __DIR__ . '/../ValueObjects/CarreraAcademicaNivelFormacion.php';
require_once __DIR__ . '/../ValueObjects/CarreraAcademicaTitulo.php';
require_once __DIR__ . '/../ValueObjects/CarreraAcademicaValorSemestre.php';
require_once __DIR__ . '/../ValueObjects/CarreraAcademicaUniversidad.php';
require_once __DIR__ . '/../ValueObjects/CarreraAcademicaEsAcreditada.php';
require_once __DIR__ . '/../ValueObjects/CarreraAcademicaAreaConocimiento.php';

final class CarreraAcademicaModel
{
    private CarreraAcademicaId $id;
    private CarreraAcademicaNombre $nombre;
    private CarreraAcademicaNumCreditos $numCreditos;
    private CarreraAcademicaNumAsignaturas $numAsignaturas;
    private CarreraAcademicaNumSemestres $numSemestres;
    private CarreraAcademicaNivelFormacion $nivelFormacion;
    private CarreraAcademicaTitulo $titulo;
    private CarreraAcademicaValorSemestre $valorSemestre;
    private CarreraAcademicaUniversidad $universidad;
    private CarreraAcademicaEsAcreditada $esAcreditada;
    private string $perfiles;
    private CarreraAcademicaAreaConocimiento $areaConocimiento;

    public function __construct(
        CarreraAcademicaId $id,
        CarreraAcademicaNombre $nombre,
        CarreraAcademicaNumCreditos $numCreditos,
        CarreraAcademicaNumAsignaturas $numAsignaturas,
        CarreraAcademicaNumSemestres $numSemestres,
        CarreraAcademicaNivelFormacion $nivelFormacion,
        CarreraAcademicaTitulo $titulo,
        CarreraAcademicaValorSemestre $valorSemestre,
        CarreraAcademicaUniversidad $universidad,
        CarreraAcademicaEsAcreditada $esAcreditada,
        string $perfiles,
        CarreraAcademicaAreaConocimiento $areaConocimiento
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->numCreditos = $numCreditos;
        $this->numAsignaturas = $numAsignaturas;
        $this->numSemestres = $numSemestres;
        $this->nivelFormacion = $nivelFormacion;
        $this->titulo = $titulo;
        $this->valorSemestre = $valorSemestre;
        $this->universidad = $universidad;
        $this->esAcreditada = $esAcreditada;
        $this->perfiles = trim($perfiles);
        $this->areaConocimiento = $areaConocimiento;
    }

    public static function create(
        CarreraAcademicaId $id,
        CarreraAcademicaNombre $nombre,
        CarreraAcademicaNumCreditos $numCreditos,
        CarreraAcademicaNumAsignaturas $numAsignaturas,
        CarreraAcademicaNumSemestres $numSemestres,
        CarreraAcademicaNivelFormacion $nivelFormacion,
        CarreraAcademicaTitulo $titulo,
        CarreraAcademicaValorSemestre $valorSemestre,
        CarreraAcademicaUniversidad $universidad,
        CarreraAcademicaEsAcreditada $esAcreditada,
        string $perfiles,
        CarreraAcademicaAreaConocimiento $areaConocimiento
    ): self {
        return new self(
            $id,
            $nombre,
            $numCreditos,
            $numAsignaturas,
            $numSemestres,
            $nivelFormacion,
            $titulo,
            $valorSemestre,
            $universidad,
            $esAcreditada,
            $perfiles,
            $areaConocimiento
        );
    }

    // Getters
    public function id(): CarreraAcademicaId { return $this->id; }
    public function nombre(): CarreraAcademicaNombre { return $this->nombre; }
    public function numCreditos(): CarreraAcademicaNumCreditos { return $this->numCreditos; }
    public function numAsignaturas(): CarreraAcademicaNumAsignaturas { return $this->numAsignaturas; }
    public function numSemestres(): CarreraAcademicaNumSemestres { return $this->numSemestres; }
    public function nivelFormacion(): CarreraAcademicaNivelFormacion { return $this->nivelFormacion; }
    public function titulo(): CarreraAcademicaTitulo { return $this->titulo; }
    public function valorSemestre(): CarreraAcademicaValorSemestre { return $this->valorSemestre; }
    public function universidad(): CarreraAcademicaUniversidad { return $this->universidad; }
    public function esAcreditada(): CarreraAcademicaEsAcreditada { return $this->esAcreditada; }
    public function perfiles(): string { return $this->perfiles; }
    public function areaConocimiento(): CarreraAcademicaAreaConocimiento { return $this->areaConocimiento; }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value(),
            'nombre' => $this->nombre->value(),
            'numCreditos' => $this->numCreditos->value(),
            'numAsignaturas' => $this->numAsignaturas->value(),
            'numSemestres' => $this->numSemestres->value(),
            'nivelFormacion' => $this->nivelFormacion->value(),
            'titulo' => $this->titulo->value(),
            'valorSemestre' => $this->valorSemestre->value(),
            'universidad' => $this->universidad->value(),
            'esAcreditada' => $this->esAcreditada->value(),
            'perfiles' => $this->perfiles,
            'areaConocimiento' => $this->areaConocimiento->value(),
        ];
    }
}