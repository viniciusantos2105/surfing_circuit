<?php

namespace App\Http\Controllers;

use App\Dto\request\HeatRegisterRequest;
use App\Helpers\Response;
use App\Services\HeatService;
use Illuminate\Http\JsonResponse;

class HeatController extends Controller
{

    protected $heatService;

    public function __construct(HeatService $heatService)
    {
        $this->heatService = $heatService;
    }

    public function getHeatDetails(int $id): JsonResponse
    {
        $heat = $this->heatService->getHeatDetails($id);
        return Response::successResponse($heat);
    }

    public function getWinner(int $id): JsonResponse
    {
        $winner = $this->heatService->getWinner($id);
        return Response::successResponse($winner);
    }

    public function registerHeat(HeatRegisterRequest $request): JsonResponse
    {
        $request->validated();
        $heat = $this->heatService->registerHeat($request);
        return Response::successResponse($heat);
    }
}
