<?php

namespace App\Dto\response;

class WaveViewResponse
{
    public $waveId;
    public $waveSurfer;
    public $waveHeat;

    public function __construct($waveId, $waveSurfer, $waveHeat)
    {
        $this->waveId = $waveId;
        $this->waveSurfer = $waveSurfer;
        $this->waveHeat = $waveHeat;
    }


}
