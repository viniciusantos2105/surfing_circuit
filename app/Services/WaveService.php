<?php

namespace App\Services;

use App\Contracts\Repositories\WaveRepositoryInterface;
use App\Contracts\Services\WaveServiceInterface;
use App\Exceptions\Resource\ResourceInvalidException;
use App\Models\Heat;
use App\Models\Surfer;
use App\Models\Wave;

class WaveService implements WaveServiceInterface
{
    protected $waveRepository;


    public function __construct(WaveRepositoryInterface $waveRepository)
    {
        $this->waveRepository = $waveRepository;
    }

    public function getWave(int $id): Wave
    {
        return $this->waveRepository->getWave($id);
    }

    public function getWaveBySurferAndHeat(int $surferNumber, int $heatId): array
    {
        return $this->waveRepository->getWaveBySurferAndHeat($surferNumber, $heatId);
    }

    /**
     * @throws ResourceInvalidException
     */
    public function registerWave(Heat $heat, Surfer $surfer): Wave
    {
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
        if ($heat->getHeatSurfer1() != $surfer->getSurferNumber() && $heat->getHeatSurfer2() != $surfer->getSurferNumber()) {
            throw ResourceInvalidException::create('wave', 'surfer_number', 'Surfista não está na bateria selecionada');
        }
    }
}
