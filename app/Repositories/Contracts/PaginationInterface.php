<?php

namespace App\Repositories\Contracts;

interface PaginationInterface
{
    /**
     * @return stdClass[]
     */
    public function items(): array;
    public function total(): int;
    public function isFirstPage(): bool; //primeira página
    public function isLastPage(): bool; //ultima página
    public function currentPage(): int;
    public function getNumberNextPage(): int;
    public function getNumberPreviousPage(): int;
    
}
