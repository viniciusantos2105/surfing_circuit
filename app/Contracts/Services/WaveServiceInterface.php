<?php

namespace App\Contracts\Services;

interface WaveServiceInterface
{
    public function getWave(int $id);
//    public function getWaveDetails(int $id): WaveViewResponse;
//    public function registerWave(int $heatId, int $surferId): Wave;
}
