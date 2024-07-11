<?php

namespace App\Services;

use App\Contracts\WaveRepositoryInterface;
use App\Dto\SurferRegisterRequest;
use App\Dto\WaveViewResponse;
use App\Exceptions\Resource\ResourceInvalidException;
use App\Models\Wave;

class WaveService
{
    protected $waveRepository;
    protected $heatService;
    protected $surferService;

    public function __construct(WaveRepositoryInterface $waveRepository, HeatService $heatService, SurferService $surferService)
    {
        $this->waveRepository = $waveRepository;
        $this->heatService = $heatService;
        $this->surferService = $surferService;
    }

    public function getWave(int $id): Wave
    {
        return $this->waveRepository->getWave($id);
    }


    public function getWaveDetails(int $id) : WaveViewResponse
    {
        $wave = $this->getWave($id);
        $heat = $this->heatService->getHeat($wave->getWaveHeat());
        $surfer = $this->surferService->getSurfer($wave->getWaveSurfer());
        return new WaveViewResponse($wave->getWaveId(), $surfer, $heat->getHeatId());
    }

    /**
     * @throws ResourceInvalidException
     */
    public function registerWave(int $heatId, int $surferId) : Wave
    {
        $heat = $this->heatService->getHeat($heatId);
        $surfer = $this->surferService->getSurfer($surferId);
        $wave = [
            "heat_id" => $heat->getHeatId(),
            "surfer_number" => $surfer->getSurferNumber(),
        ];
        $this->verifySurferHeat($surfer, $heat);
        return $this->waveRepository->registerWave($wave);
    }

    /**
     * @throws ResourceInvalidException
     */
    private function verifySurferHeat($surfer, $heat)
    {
        if($heat->getHeatSurfer1() != $surfer->getSurferNumber() && $heat->getHeatSurfer2() != $surfer->getSurferNumber())
        {
            throw ResourceInvalidException::create('wave', 'surfer_number', 'Surfista não está na bateria selecionada');
        }
    }
}
