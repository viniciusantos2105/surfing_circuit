<?php

namespace App\Http\Controllers;

use App\Contracts\Services\HeatServiceInterface;
use App\Contracts\Services\SurferServiceInterface;
use App\Contracts\Services\WaveServiceInterface;
use App\Dto\response\WaveViewResponse;
use App\Exceptions\Resource\ResourceInvalidException;
use App\Helpers\Response;
use Illuminate\Http\JsonResponse;

class WaveController extends Controller
{

    protected $waveService;
    protected $surferService;
    protected $heatService;

    public function __construct(WaveServiceInterface $waveService, SurferServiceInterface $surferService, HeatServiceInterface $heatService)
    {
        $this->waveService = $waveService;
        $this->surferService = $surferService;
        $this->heatService = $heatService;
    }

    public function getWaveDetails(int $id): JsonResponse
    {
        $wave = $this->waveService->getWave($id);
        $heat = $this->heatService->getHeat($wave->getWaveHeat());
        $surfer = $this->surferService->getSurfer($wave->getWaveSurfer());
        return Response::successResponse(new WaveViewResponse($wave->getWaveId(), $surfer, $heat->getHeatId()));
    }

    /**
     * @throws ResourceInvalidException
     */
    public function registerWave(int $heatId, int $surferId): JsonResponse
    {
        $heat = $this->heatService->getHeat($heatId);
        $surfer = $this->surferService->getSurfer($surferId);
        $wave = $this->waveService->registerWave($heat, $surfer);
        return Response::successResponse($wave);
    }

}
