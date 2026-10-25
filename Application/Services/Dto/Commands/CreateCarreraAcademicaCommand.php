<?php

declare(strict_types=1);

final class CreateCarreraAcademicaCommand
{
    private string $nombre;
    private int $numCreditos;
    private int $numAsignaturas;
    private int $numSemestres;
    private string $nivelFormacion;
    private string $titulo;
    private float $valorSemestre;
    private string $universidad;
    private bool $esAcreditada;
    private string $perfiles;
    private string $areaConocimiento;

    public function __construct(
        string $nombre,
        int $numCreditos,
        int $numAsignaturas,
        int $numSemestres,
        string $nivelFormacion,
        string $titulo,
        float $valorSemestre,
        string $universidad,
        bool $esAcreditada,
        string $perfiles,
        string $areaConocimiento
    ) {
        $this->nombre = trim($nombre);
        $this->numCreditos = $numCreditos;
        $this->numAsignaturas = $numAsignaturas;
        $this->numSemestres = $numSemestres;
        $this->nivelFormacion = trim($nivelFormacion);
        $this->titulo = trim($titulo);
        $this->valorSemestre = $valorSemestre;
        $this->universidad = trim($universidad);
        $this->esAcreditada = $esAcreditada;
        $this->perfiles = trim($perfiles);
        $this->areaConocimiento = trim($areaConocimiento);
    }

    public function nombre(): string { return $this->nombre; }
    public function numCreditos(): int { return $this->numCreditos; }
    public function numAsignaturas(): int { return $this->numAsignaturas; }
    public function numSemestres(): int { return $this->numSemestres; }
    public function nivelFormacion(): string { return $this->nivelFormacion; }
    public function titulo(): string { return $this->titulo; }
    public function valorSemestre(): float { return $this->valorSemestre; }
    public function universidad(): string { return $this->universidad; }
    public function esAcreditada(): bool { return $this->esAcreditada; }
    public function perfiles(): string { return $this->perfiles; }
    public function areaConocimiento(): string { return $this->areaConocimiento; }
}