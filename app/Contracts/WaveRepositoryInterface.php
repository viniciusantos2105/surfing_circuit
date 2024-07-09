<?php

namespace App\Contracts;

interface WaveRepositoryInterface
{
    public function registerWave(array $data);
    public function getWave(int $id);
    public function deleteWave(int $id);
}
