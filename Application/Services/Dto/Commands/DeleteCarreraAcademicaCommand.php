<?php

declare(strict_types=1);

final class DeleteCarreraAcademicaCommand
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = trim($id);
    }

    public function id(): string
    {
        return $this->id;
    }
}