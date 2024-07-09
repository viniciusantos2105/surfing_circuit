<?php

namespace App\Repositories;

use App\Contracts\HeatRepositoryInterface;
use App\Models\Heat;
use Illuminate\Support\Facades\DB;
class HeatRepository implements HeatRepositoryInterface
{

    private $model;

    public function __construct(Heat $heat)
    {
        $this->model = $heat;
    }

    public function getWinnerHeat(int $id)
    {
        // TODO: Implement getWinnerHeat() method.
    }

    public function registerHeat(array $data)
    {
        DB::beginTransaction();
        $heat = $this->model->create($data);
        DB::commit();
        return $heat;
    }
}
