<?php

namespace App\Http\Controllers;

use App\Contracts\Services\HeatServiceInterface;
use App\Contracts\Services\NoteServiceInterface;
use App\Contracts\Services\SurferServiceInterface;
use App\Contracts\Services\WaveServiceInterface;
use App\Dto\request\HeatRegisterRequest;
use App\Dto\response\HeatWinnerResponse;
use App\Helpers\Response;
use Illuminate\Http\JsonResponse;

class HeatController extends Controller
{

    protected $heatService;
    protected $surferService;
    protected $waveService;
    protected $noteService;

    public function __construct(HeatServiceInterface $heatService, SurferServiceInterface $surferService,
                                WaveServiceInterface $waveService, NoteServiceInterface $noteService)
    {
        $this->heatService = $heatService;
        $this->surferService = $surferService;
        $this->waveService = $waveService;
        $this->noteService = $noteService;
    }

    public function getHeatDetails(int $id): JsonResponse
    {
        $heat = $this->heatService->getHeat($id);
        $surfer1 = $this->surferService->getSurfer($heat->surfer1_number);
        $surfer2 = $this->surferService->getSurfer($heat->surfer2_number);
        $response = $this->heatService->getHeatDetails($heat, $surfer1, $surfer2);
        return Response::successResponse($response);
    }

    public function getHeatWinner(int $id): JsonResponse
    {
        $heat = $this->heatService->getHeat($id);
        $wavesSurfer1 = $this->waveService->getWaveBySurferAndHeat($heat->surfer1_number, $heat->heat_id);
        $noteSurfer1 = $this->noteService->getNoteHeat($wavesSurfer1);
        $wavesSurfer2 = $this->waveService->getWaveBySurferAndHeat($heat->surfer2_number, $heat->heat_id);
        $noteSurfer2 = $this->noteService->getNoteHeat($wavesSurfer2);
        $winner = $this->heatService->getHeatWinner($heat, $noteSurfer1, $noteSurfer2);
        $winningSurfer = $this->surferService->getSurfer($winner->heatSurfer);
        $winnerDetails = new HeatWinnerResponse($winner->heatId, $winningSurfer, $winner->heatScore);
        return Response::successResponse($winnerDetails);
    }

    public function registerHeat(HeatRegisterRequest $request): JsonResponse
    {
        $request->validated();
        $surfer1 = $this->surferService->getSurfer($request->heatSurfer1());
        $surfer2 = $this->surferService->getSurfer($request->heatSurfer2());
        $heat = $this->heatService->registerHeat($surfer1, $surfer2);
        return Response::successResponse($heat);
    }
}
