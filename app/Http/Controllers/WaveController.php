<?php

namespace App\Http\Controllers;

use App\Exceptions\DuplicateEntryException;
use App\Exceptions\Resource\ResourceInvalidException;
use App\Helpers\Response;
use App\Services\HeatService;
use App\Services\SurferService;
use App\Services\WaveService;
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

    public function getWaveDetails(int $id): JsonResponse
    {
        $wave = $this->waveService->getWaveDetails($id);
        return Response::successResponse($wave);
    }

    /**
     * @throws ResourceInvalidException
     */
    public function registerWave(int $heatId, int $surferId): JsonResponse
    {
        $wave = $this->waveService->registerWave($heatId, $surferId);
        return Response::successResponse($wave);
    }

}
