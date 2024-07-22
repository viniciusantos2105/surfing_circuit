<?php

namespace App\Contracts\Repositories;

interface NoteRepositoryInterface
{
    public function registerNote(array $data);

    public function getNoteByWave(int $id);
}
