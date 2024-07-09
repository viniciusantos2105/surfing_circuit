<?php

namespace App\Http\Controllers;

use App\Dto\SurferRegisterRequest;
use App\Exceptions\DuplicateEntryException;
use App\Helpers\ErrorResponse;
use App\Helpers\Response;
use App\Services\SurferService;
use App\Services\WaveService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;

class WaveController extends Controller
{

    protected $waveService;

    public function __construct(WaveService $waveService)
    {
        $this->waveService = $waveService;
    }
}
