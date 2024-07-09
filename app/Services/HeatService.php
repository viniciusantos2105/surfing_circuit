<?php

namespace App\Services;

use App\Contracts\HeatRepositoryInterface;
use App\Dto\HeatRegisterRequest;
use App\Models\Heat;

class HeatService
{

    protected $heatRepository;
    protected $surferService;
    public function __construct(HeatRepositoryInterface $heatRepository, SurferService $surferService)
    {
        $this->heatRepository = $heatRepository;
        $this->surferService = $surferService;
    }

    public function registerHeat(HeatRegisterRequest $request) : Heat
    {
        $surfer1 = $this->surferService->getSurfer($request->heatSurfer1());
        $surfer2 = $this->surferService->getSurfer($request->heatSurfer2());

        $heatData = [
            "surfer1_number" => $surfer1['surfer_number'],
            "surfer2_number" => $surfer2['surfer_number'],
        ];

        return $this->heatRepository->registerHeat($heatData);
    }

    public function getHeat(int $id) : Heat
    {
        return $this->heatRepository->getHeat($id);
    }
}
