<?php

namespace App\Contracts;

use App\Models\Surfer;

interface SurferRepositoryInterface
{
    public function getSurferById(int $id);
    public function createSurfer(array $data) : Surfer;
    public function listSurfers();
    public function updateSurfer(array $data);
    public function deleteSurfer(int $id);
}
