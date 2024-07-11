<?php

namespace App\Services;

use App\Contracts\WaveRepositoryInterface;
use App\Dto\SurferRegisterRequest;
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

    public function registerWave(int $heatId, int $surferId) : Wave
    {
        $heat = $this->heatService->getHeat($heatId);
        $surfer = $this->surferService->getSurfer($surferId);
        $wave = [
            "heat_id" => $heat['heat_id'],
            "surfer_number" => $surfer['surfer_number'],
        ];
        return $this->waveRepository->registerWave($wave);
    }
}
