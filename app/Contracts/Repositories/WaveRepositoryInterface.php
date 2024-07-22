<?php

namespace App\Contracts\Repositories;

interface WaveRepositoryInterface
{
    public function registerWave(array $data);
    public function getWave(int $id);
    public function getWaveBySurferAndHeat(int $surferNumber, int $heatId);
    public function deleteWave(int $id);
}
