<?php

namespace App\Dto\response;

class NoteViewResponse
{
    public $waveId;
    public $finalScore;

    public function __construct($waveId, $finalScore)
    {
        $this->waveId = $waveId;
        $this->finalScore = $finalScore;
    }


}
