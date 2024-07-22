<?php

namespace App\Contracts\Repositories;

use App\Models\Surfer;

interface SurferRepositoryInterface
{
    public function getSurferById(int $id): Surfer;

    public function registerSurfer(array $data): Surfer;

    public function listSurfers();

    public function updateSurfer(array $data);

    public function deleteSurfer(int $id);
}
