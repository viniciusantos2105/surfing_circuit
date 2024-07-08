<?php

namespace App\Services;

use App\Contracts\SurferRepositoryInterface;
use App\Dto\SurferCreateRequest;
use App\Models\Surfer;

class SurferService
{
    protected $surferRepository;

    public function __construct(SurferRepositoryInterface $surferRepository)
    {
        $this->surferRepository = $surferRepository;
    }

    public function getSurfer($surferId)
    {
        $surfer = $this->surferRepository->getSurferById($surferId);
        return $surfer;
    }

    public function listSurfers()
    {
        return $this->surferRepository->listSurfers();
    }

    public function createSurfer(SurferCreateRequest $request) : Surfer
    {
        $surfer = [
            'surfer_name' => $request->surferName,
            'surfer_country' => $request->surferCountry
        ];
        return $this->surferRepository->createSurfer($surfer);
    }
}
