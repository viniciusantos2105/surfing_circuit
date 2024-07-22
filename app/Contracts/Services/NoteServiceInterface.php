<?php

namespace App\Contracts\Services;

use App\Dto\request\NoteRegisterRequest;
use App\Dto\response\NoteViewResponse;
use App\Models\Wave;

interface NoteServiceInterface
{
    public function registerNote(Wave $wave, NoteRegisterRequest $request);
    public function getNoteResult(int $waveId): NoteViewResponse;
    public function getNoteHeat(array $waveSurfer);
}
