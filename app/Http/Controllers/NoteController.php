<?php

namespace App\Http\Controllers;

use App\Dto\request\NoteRegisterRequest;
use App\Helpers\Response;
use App\Services\NoteService;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{

    protected $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function registerNote(int $waveId, NoteRegisterRequest $request): JsonResponse
    {
        $request->validated();
        $note = $this->noteService->registerNote($waveId, $request);
        return Response::successResponse($note);
    }

    public function getNoteResult(int $waveId): JsonResponse
    {
        $note = $this->noteService->getNoteResult($waveId);
        return Response::successResponse($note);
    }

}
