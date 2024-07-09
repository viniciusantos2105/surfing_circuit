<?php

namespace App\Repositories;

use App\Contracts\SurferRepositoryInterface;
use App\Exceptions\Resource\ResourceAlreadyExistis;
use App\Exceptions\Resource\ResourceNotFoundException;
use App\Models\Surfer;
use Illuminate\Support\Facades\DB;

class SurferRepository implements SurferRepositoryInterface
{
    private $model;

    public function __construct(Surfer $surfer)
    {
        $this->model = $surfer;
    }

    /**
     * @throws ResourceNotFoundException
     */
    public function getSurferById(int $id) : array
    {
        DB::beginTransaction();
        $surfer = $this->model->where('surfer_number', $id)->first();
        DB::commit();
        if($surfer == null){
            throw ResourceNotFoundException::create('surfer', 'surfer_number', "Surfista número {$id} não encontrado");
        }
        return $surfer ? $surfer->toArray() : [];
    }

    public function listSurfers()
    {
        DB::beginTransaction();
        $surfers = $this->model->all();
        DB::commit();
        return $surfers;
    }

    /**
     * @throws ResourceAlreadyExistis
     */
    public function registerSurfer(array $data): Surfer
    {
        DB::beginTransaction();
        try{
            $surfer = $this->model->create($data);
        }catch (\Exception $e){
            DB::rollBack();
            throw ResourceAlreadyExistis::create('surfer', 'surfer_number', 'Nome de surfista já cadastrado');
        }
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
