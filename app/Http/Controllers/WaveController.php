<?php

namespace App\Http\Controllers;

use App\Dto\SurferRegisterRequest;
use App\Dto\WaveViewResponse;
use App\Exceptions\DuplicateEntryException;
use App\Helpers\ErrorResponse;
use App\Helpers\Response;
use App\Services\HeatService;
use App\Services\SurferService;
use App\Services\WaveService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;

class WaveController extends Controller
{

    protected $waveService;
    protected $surferService;
    protected $heatService;

    public function __construct(WaveService $waveService, SurferService $surferService, HeatService $heatService)
    {
        $this->waveService = $waveService;
        $this->surferService = $surferService;
        $this->heatService = $heatService;
    }

    public function getWave(int $id) : JsonResponse
    {
        $wave = $this->waveService->getWaveDetails($id);
        return Response::successResponse($wave);
    }

    public function registerWave(int $heatId, int $surferId): JsonResponse
    {
        $wave = $this->waveService->registerWave($heatId, $surferId);
        return Response::successResponse($wave);
    }

}
