<?php

namespace App\Services;

use App\Contracts\Repositories\HeatRepositoryInterface;
use App\Contracts\Services\HeatServiceInterface;
use App\Dto\response\HeatViewResponse;
use App\Dto\response\HeatWinnerResponse;
use App\Models\Heat;
use App\Models\Surfer;

class HeatService implements HeatServiceInterface
{

    protected $heatRepository;

    public function __construct(HeatRepositoryInterface $heatRepository)
    {
        $this->heatRepository = $heatRepository;
    }

    public function registerHeat(Surfer $surfer1, Surfer $surfer2): Heat
    {
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

    public function getHeatDetails(Heat $heat, Surfer $surfer1, Surfer $surfer2): HeatViewResponse
    {
        return new HeatViewResponse($heat->getHeatId(), $surfer1, $surfer2);
    }

    public function getHeatWinner(Heat $heat, float $noteSurfer1, float $noteSurfer2): HeatWinnerResponse
    {
        if ($noteSurfer1 > $noteSurfer2) {
            return new HeatWinnerResponse($heat->getHeatId(), $heat->getHeatSurfer1(), $noteSurfer1);
        } else {
            return new HeatWinnerResponse($heat->getHeatId(), $heat->getHeatSurfer2(), $noteSurfer2);
        }
    }

}
