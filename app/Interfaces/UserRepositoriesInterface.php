<?php

namespace App\Interfaces;

interface UserRepositoriesInterface
{
    public function getAll(
        ?string $search,
        ?int $limit,
        bool $execute
    );
}
