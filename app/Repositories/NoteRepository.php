<?php

namespace App\Repositories;

use App\Contracts\Repositories\NoteRepositoryInterface;
use App\Exceptions\Resource\ResourceCannotCreateException;
use App\Exceptions\Resource\ResourceNotFoundException;
use App\Models\Note;
use Illuminate\Support\Facades\DB;

class NoteRepository implements NoteRepositoryInterface
{

    protected $model;

    public function __construct(Note $note)
    {
        $this->model = $note;
    }

    /**
     * @throws ResourceCannotCreateException
     */
    public function registerNote(array $data): Note
    {
        try {
            DB::beginTransaction();
            $note = $this->model->create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            throw ResourceCannotCreateException::create('Note');
        }
        DB::commit();
        return $note;
    }

    /**
     * @throws ResourceNotFoundException
     */
    public function getNoteByWave(int $id): Note
    {
        $note = $this->model->where(Note::NOTE_WAVE, $id)->first();
        if ($note == null) {
            throw ResourceNotFoundException::create('note', 'wave_id', 'Nota não encontrada');
        }
        return $note;
    }
}
