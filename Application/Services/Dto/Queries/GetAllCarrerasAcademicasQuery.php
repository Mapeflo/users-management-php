<?php

declare(strict_types=1);

final class GetAllCarrerasAcademicasQuery
{
    private ?string $search;
    private int $page;
    private int $limit;

    public function __construct(?string $search = null, int $page = 1, int $limit = 10)
    {
        $this->search = $search !== null ? trim($search) : null;
        $this->page = $page > 0 ? $page : 1;
        $this->limit = $limit > 0 ? $limit : 10;
    }

    public function search(): ?string
    {
        return $this->search;
    }

    public function page(): int
    {
        return $this->page;
    }

    public function limit(): int
    {
        return $this->limit;
    }
}