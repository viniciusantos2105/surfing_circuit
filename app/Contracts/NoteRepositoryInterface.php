<?php

namespace App\Contracts;

interface NoteRepositoryInterface
{
    public function registerNote(array $data);

    public function getNoteByWave(int $id);
}
