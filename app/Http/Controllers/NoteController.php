<?php

namespace App\Http\Controllers;

use App\Dto\SurferRegisterRequest;
use App\Exceptions\DuplicateEntryException;
use App\Helpers\ErrorResponse;
use App\Helpers\Response;
use App\Services\NoteService;
use App\Services\SurferService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{

    protected $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }
}
