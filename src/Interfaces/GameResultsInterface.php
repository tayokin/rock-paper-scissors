<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\DTO\GameResults;

interface GameResultsInterface
{
    public function getResults(): GameResults;
}
