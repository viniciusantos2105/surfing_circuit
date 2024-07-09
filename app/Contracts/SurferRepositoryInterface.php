<?php

namespace App\Contracts;

use App\Models\Surfer;

interface SurferRepositoryInterface
{
    public function getSurferById(int $id);
    public function registerSurfer(array $data) : Surfer;
    public function listSurfers();
    public function updateSurfer(array $data);
    public function deleteSurfer(int $id);
}
