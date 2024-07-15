<?php

namespace App\Dto\response;

class HeatWinnerResponse
{
    protected $heatId;
    protected $heatSurfer;
    protected $heatScore;

    public function __construct($heatId, $heatSurfer, $heatScore)
    {
        $this->heatId = $heatId;
        $this->heatSurfer = $heatSurfer;
        $this->heatScore = $heatScore;
    }
}
