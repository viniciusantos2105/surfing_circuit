<?php

namespace App\Http\Controllers;

use App\Dto\request\SurferRegisterRequest;
use App\Exceptions\DuplicateEntryException;
use App\Helpers\Response;
use App\Services\SurferService;
use Illuminate\Http\JsonResponse;

class SurferController extends Controller
{

    protected $surferService;

    public function __construct(SurferService $surferService)
    {
        $this->surferService = $surferService;
    }

    public function getSurfer(int $id): JsonResponse
    {
        $surfer = $this->surferService->getSurfer($id);
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

