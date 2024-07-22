<?php

namespace App\Services;

use App\Contracts\Repositories\NoteRepositoryInterface;
use App\Contracts\Services\NoteServiceInterface;
use App\Contracts\Services\WaveServiceInterface;
use App\Dto\request\NoteRegisterRequest;
use App\Dto\response\NoteViewResponse;
use App\Models\Wave;

class NoteService implements NoteServiceInterface
{

    protected $noteRepository;

    public function __construct(NoteRepositoryInterface $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function registerNote(Wave $wave, NoteRegisterRequest $request)
    {
        $note = [
            "wave_id" => $wave->getWaveId(),
            "partialScore1" => $request->partialScore1,
            "partialScore2" => $request->partialScore2,
            "partialScore3" => $request->partialScore3,
        ];
        return $this->noteRepository->registerNote($note);
    }

    public function getNoteResult(int $waveId): NoteViewResponse
    {
        $noteWave = $this->noteRepository->getNoteByWave($waveId);
        $finalNote = ($noteWave->partialScore1 + $noteWave->partialScore2 + $noteWave->partialScore3) / 3;
        return new NoteViewResponse($noteWave->wave_id, $finalNote);
    }

    public function getNoteHeat(array $wavesSurfer)
    {
        $notesSurfer = [];
        foreach ($wavesSurfer as $wave) {
            $noteResult = $this->getNoteResult($wave['wave_id']);
            if ($noteResult instanceof NoteViewResponse) {
                $notesSurfer[] = $noteResult->finalScore;
            }
        }

        rsort($notesSurfer);
        $topTwoNotes = array_slice($notesSurfer, 0, 2);
        return array_sum($topTwoNotes) / 2;
    }
}
