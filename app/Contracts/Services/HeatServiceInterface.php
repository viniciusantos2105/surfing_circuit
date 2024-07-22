<?php

namespace App\Contracts\Services;

use App\Dto\request\HeatRegisterRequest;
use App\Dto\response\HeatViewResponse;
use App\Dto\response\HeatWinnerResponse;
use App\Models\Heat;
use App\Models\Surfer;

interface HeatServiceInterface
{
    public function registerHeat(Surfer $surfer1, Surfer $surfer2): Heat;
    public function getHeat(int $id): Heat;
    public function getHeatDetails(Heat $heat, Surfer $surfer1, Surfer $surfer2): HeatViewResponse;
    public function getHeatWinner(Heat $heat, array $waveSurfer1, array $waveSurfer2): HeatWinnerResponse;
}
