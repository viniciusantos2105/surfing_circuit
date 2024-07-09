<?php

namespace App\Http\Controllers;

use App\Dto\HeatRegisterRequest;
use App\Dto\HeatViewResponse;
use App\Dto\SurferRegisterRequest;
use App\Exceptions\DuplicateEntryException;
use App\Helpers\ErrorResponse;
use App\Helpers\Response;
use App\Services\HeatService;
use App\Services\SurferService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Js;

class HeatController extends Controller
{

    protected $heatService;
    protected $surferService;

    public function __construct(HeatService $heatService, SurferService $surferService)
    {
        $this->heatService = $heatService;
        $this->surferService = $surferService;
    }

    public function getHeat(int $id) : JsonResponse
    {
        $heat = $this->heatService->getHeat($id);
        $surfer1 = $this->surferService->getSurfer($heat->surfer1_number);
        $surfer2 = $this->surferService->getSurfer($heat->surfer2_number);
        $heatResponse = new HeatViewResponse($heat->heat_id, $surfer1, $surfer2);
        return Response::successResponse($heatResponse);
    }

    public function registerHeat(HeatRegisterRequest $request): JsonResponse
    {
        $request->validated();
        $heat = $this->heatService->registerHeat($request);
        return Response::successResponse($heat);
    }
}
