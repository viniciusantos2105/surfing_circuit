<?php

namespace App\Repositories;

use App\Contracts\SurferRepositoryInterface;
use App\Models\Surfer;
use Illuminate\Support\Facades\DB;

class SurferRepository implements SurferRepositoryInterface
{
    private $model;

    public function __construct(Surfer $surfer)
    {
        $this->model = $surfer;
    }

    public function getSurferById(int $id)
    {
        // TODO: Implement getSurferById() method.
    }

    public function listSurfers()
    {
        DB::beginTransaction();
        $surfers = $this->model->all();
        DB::commit();
        return $surfers;
    }

    public function registerSurfer(array $data) : Surfer
    {
        DB::beginTransaction();
        $surfer = $this->model->create($data);
        DB::commit();
        return $surfer;
    }

    public function updateSurfer(array $data)
    {
        // TODO: Implement updateSurfer() method.
    }

    public function deleteSurfer(int $id)
    {
        // TODO: Implement deleteSurfer() method.
    }
}
