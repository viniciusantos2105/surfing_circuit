<?php

namespace App\Contracts\Repositories;

use App\Models\Heat;

interface HeatRepositoryInterface
{
    public function getHeat(int $id): Heat;

    public function getWinnerHeat(int $id);

    public function registerHeat(array $data);

}
