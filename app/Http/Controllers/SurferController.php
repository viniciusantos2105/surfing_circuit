<?php

namespace App\Http\Controllers;

use App\Dto\SurferRegisterRequest;
use App\Exceptions\DuplicateEntryException;
use App\Helpers\ErrorResponse;
use App\Helpers\Response;
use App\Services\SurferService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;

class SurferController extends Controller
{

    protected $surferService;

    public function __construct(SurferService $surferService)
    {
        $this->surferService = $surferService;
    }

    public function getSurferById(int $id): JsonResponse
    {
        $surfer = $this->surferService->getSurferById($id);
        return Response::successResponse($surfer);
    }

    public function listSurfers(): JsonResponse
    {
        $surfers = $this->surferService->listSurfers();
        return Response::successResponse($surfers);
    }

    public function registerSurfer(SurferRegisterRequest $request): JsonResponse
    {
        $request->validated();
        $surfer = $this->surferService->registerSurfer($request);
        return Response::successResponse($surfer);
    }
}

