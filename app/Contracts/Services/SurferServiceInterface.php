<?php

namespace App\Contracts\Services;

use App\Dto\request\SurferRegisterRequest;
use App\Models\Surfer;

interface SurferServiceInterface
{
    public function getSurfer($surferId): Surfer;
    public function listSurfers();
    public function registerSurfer(SurferRegisterRequest $request): Surfer;
}
