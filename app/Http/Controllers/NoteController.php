<?php

namespace App\Http\Controllers;

use App\Contracts\Services\NoteServiceInterface;
use App\Contracts\Services\WaveServiceInterface;
use App\Dto\request\NoteRegisterRequest;
use App\Helpers\Response;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{

    protected $noteService;
    protected $waveService;

    public function __construct(NoteServiceInterface $noteService, WaveServiceInterface $waveService)
    {
        $this->noteService = $noteService;
        $this->waveService = $waveService;
    }

    public function registerNote(int $waveId, NoteRegisterRequest $request): JsonResponse
    {
        $request->validated();
        $wave = $this->waveService->getWave($waveId);
        $note = $this->noteService->registerNote($wave, $request);
        return Response::successResponse($note);
    }

    public function getNoteResult(int $waveId): JsonResponse
    {
        $note = $this->noteService->getNoteResult($waveId);
        return Response::successResponse($note);
    }

}
