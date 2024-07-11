<?php

namespace App\Services;

use App\Contracts\SurferRepositoryInterface;
use App\Dto\SurferRegisterRequest;
use App\Models\Surfer;

class SurferService
{
    protected $surferRepository;

    public function __construct(SurferRepositoryInterface $surferRepository)
    {
        $this->surferRepository = $surferRepository;
    }


    public function getSurfer($surferId): Surfer
    {
        return $this->surferRepository->getSurferById($surferId);
    }

    public function listSurfers()
    {
        return $this->surferRepository->listSurfers();
    }

    public function registerSurfer(SurferRegisterRequest $request): Surfer
    {
        $surfer = [
            'surfer_name' => $request->surferName,
            'surfer_country' => $request->surferCountry
        ];
        return $this->surferRepository->registerSurfer($surfer);
    }
}
