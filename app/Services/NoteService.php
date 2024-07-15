<?php

namespace App\Services;

use App\Contracts\NoteRepositoryInterface;
use App\Dto\request\NoteRegisterRequest;
use App\Dto\response\NoteViewResponse;

class NoteService
{

    protected $noteRepository;
    protected $waveService;

    public function __construct(NoteRepositoryInterface $noteRepository, WaveService $waveService)
    {
        $this->noteRepository = $noteRepository;
        $this->waveService = $waveService;
    }

    public function registerNote(int $waveId, NoteRegisterRequest $request)
    {
        $wave = $this->waveService->getWave($waveId);
        $note = [
            "wave_id" => $wave->getWaveId(),
            "partialScore1" => $request->partialScore1,
            "partialScore2" => $request->partialScore2,
            "partialScore3" => $request->partialScore3,
        ];
        error_log(print_r($note, true));
        return $this->noteRepository->registerNote($note);
    }

    public function getNoteResult(int $waveId): NoteViewResponse
    {
        $noteWave = $this->noteRepository->getNoteByWave($waveId);
        $finalNote = ($noteWave->partialScore1 + $noteWave->partialScore2 + $noteWave->partialScore3) / 3;
        return new NoteViewResponse($noteWave->wave_id, $finalNote);
    }
}
