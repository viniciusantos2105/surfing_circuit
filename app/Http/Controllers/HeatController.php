<?php

namespace App\Http\Controllers;

use App\Contracts\Services\HeatServiceInterface;
use App\Contracts\Services\SurferServiceInterface;
use App\Contracts\Services\WaveServiceInterface;
use App\Dto\request\HeatRegisterRequest;
use App\Helpers\Response;
use Illuminate\Http\JsonResponse;

class HeatController extends Controller
{

    protected $heatService;
    protected $surferService;
    protected $waveService;

    public function __construct(HeatServiceInterface $heatService, SurferServiceInterface $surferService, WaveServiceInterface $waveService)
    {
        $this->heatService = $heatService;
        $this->surferService = $surferService;
        $this->waveService = $waveService;
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
        $wavesSurfer2 = $this->waveService->getWaveBySurferAndHeat($heat->surfer2_number, $heat->heat_id);
        $winner = $this->heatService->getHeatWinner($heat, $wavesSurfer1, $wavesSurfer2);
        return Response::successResponse($winner);
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
