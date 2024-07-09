<?php

namespace App\Services;

use App\Contracts\HeatRepositoryInterface;
use App\Dto\HeatRegisterRequest;

class HeatService
{

    protected $heatRepository;

    public function __construct(HeatRepositoryInterface $heatRepository)
    {
        $this->heatRepository = $heatRepository;
    }

    public function registerHeat(HeatRegisterRequest $request)
    {
        $heat = [
            "heatSurfer1" => $request->heatSurfer1(),
            "heatSurfer2" => $request->heatSurfer2()
        ];
        return $this->heatRepository->registerHeat($heat);
    }
}
