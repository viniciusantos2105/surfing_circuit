<?php

namespace App\Dto\response;

class HeatWinnerResponse
{
    public $heatId;
    public $heatSurfer;
    public $heatScore;

    public function __construct($heatId, $heatSurfer, $heatScore)
    {
        $this->heatId = $heatId;
        $this->heatSurfer = $heatSurfer;
        $this->heatScore = $heatScore;
    }
}
