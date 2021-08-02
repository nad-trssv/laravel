<?php

declare(strict_types=1);

namespace App\Contracts;

interface Parser
{
    public function getParsedList(string $url): array;
    public function saveGoodsInFile(string $url): void;
}
