<?php

namespace App\Repositories;

use App\Contracts\HeatRepositoryInterface;
use App\Exceptions\Resource\ResourceCannotCreateException;
use App\Exceptions\Resource\ResourceNotFoundException;
use App\Models\Heat;
use Illuminate\Support\Facades\DB;
class HeatRepository implements HeatRepositoryInterface
{

    private $model;

    public function __construct(Heat $heat)
    {
        $this->model = $heat;
    }

    /**
     * @throws ResourceNotFoundException
     */
    public function getHeat(int $id): Heat
    {
        DB::beginTransaction();
        $heat = $this->model->where('heat_id', $id)->first();
        if($heat == null){
            DB::rollBack();
            throw ResourceNotFoundException::create('heat', 'heat_id', 'Bateria não encontrada');
        }
        DB::commit();
        return $heat;
    }

    public function getWinnerHeat(int $id)
    {
        // TODO: Implement getWinnerHeat() method.
    }

    /**
     * @throws ResourceCannotCreateException
     */
    public function registerHeat(array $data) : Heat
    {
        try {
            DB::beginTransaction();
            $heat = $this->model->create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            throw ResourceCannotCreateException::create('Heat');
        }
        DB::commit();
        return $heat;
    }
}
