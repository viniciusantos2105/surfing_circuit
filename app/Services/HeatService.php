<?php

namespace App\Services;

use App\Contracts\HeatRepositoryInterface;
use App\Dto\request\HeatRegisterRequest;
use App\Dto\response\HeatViewResponse;
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

    public function registerHeat(HeatRegisterRequest $request): Heat
    {
        $surfer1 = $this->surferService->getSurfer($request->heatSurfer1());
        $surfer2 = $this->surferService->getSurfer($request->heatSurfer2());

        $heatData = [
            "surfer1_number" => $surfer1->getSurferNumber(),
            "surfer2_number" => $surfer2->getSurferNumber(),
        ];

        return $this->heatRepository->registerHeat($heatData);
    }

    public function getHeat(int $id): Heat
    {
        return $this->heatRepository->getHeat($id);
    }

    public function getHeatDetails(int $id): HeatViewResponse
    {
        $heat = $this->getHeat($id);
        $surfer1 = $this->surferService->getSurfer($heat->surfer1_number);
        $surfer2 = $this->surferService->getSurfer($heat->surfer2_number);
        return new HeatViewResponse($heat->heat_id, $surfer1, $surfer2);
    }

//    public function getWinner(int $id): HeatWinnerResponse
//    {
//        $heat
//    }
}
