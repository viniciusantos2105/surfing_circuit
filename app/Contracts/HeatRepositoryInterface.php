<?php

namespace App\Contracts;

interface HeatRepositoryInterface
{
    public function getWinnerHeat(int $id);
    public function registerHeat(array $data);
    
}
