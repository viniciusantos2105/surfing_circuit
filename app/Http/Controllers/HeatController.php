<?php

namespace App\Http\Controllers;

use App\Dto\HeatRegisterRequest;
use App\Dto\SurferRegisterRequest;
use App\Exceptions\DuplicateEntryException;
use App\Helpers\ErrorResponse;
use App\Helpers\Response;
use App\Services\HeatService;
use App\Services\SurferService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;

class HeatController extends Controller
{

    protected $heatService;

    public function __construct(HeatService $heatService)
    {
        $this->heatService = $heatService;
    }

    public function registerHeat(HeatRegisterRequest $request): JsonResponse
    {
        $request->validated();
        $heat = $this->heatService->registerHeat($request);
        return Response::successResponse($heat);
    }
}
