<?php

namespace App\Repositories;

use App\Contracts\WaveRepositoryInterface;
use App\Exceptions\Resource\ResourceNotFoundException;
use App\Models\Wave;
use Illuminate\Support\Facades\DB;

class WaveRepository implements WaveRepositoryInterface
{

    private $model;

    public function __construct(Wave $wave)
    {
        $this->model = $wave;
    }

    public function registerWave(array $data)
    {
        DB::beginTransaction();
        $wave = $this->model->create($data);
        if ($wave == null) {
            DB::rollBack();
        }
        DB::commit();
        return $wave;
    }

    /**
     * @throws ResourceNotFoundException
     */
    public function getWave(int $id): Wave
    {
        DB::beginTransaction();
        $wave = $this->model->where('wave_id', $id)->first();
        if ($wave == null) {
            DB::rollBack();
            throw ResourceNotFoundException::create('wave', 'wave_id', 'Onda não encontrada');
        }
        DB::commit();
        return $wave;
    }

    public function deleteWave(int $id)
    {
        // TODO: Implement deleteWave() method.
    }
}
