<?php

namespace App\Contracts\Services;

use App\Dto\response\WaveViewResponse;
use App\Models\Wave;

interface WaveServiceInterface
{
    public function getWave(int $id);
//    public function getWaveDetails(int $id): WaveViewResponse;
//    public function registerWave(int $heatId, int $surferId): Wave;
}
