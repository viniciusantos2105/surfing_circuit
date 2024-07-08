<?php

namespace App\Http\Controllers;

use App\Dto\SurferCreateRequest;
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

    public function getSurferById(int $id)
    {
        $surfer = $this->surferService->getSurferById($id);
        return Response::successResponse($surfer);
    }

    public function listSurfers() : JsonResponse
    {
        $surfers = $this->surferService->listSurfers();
        return Response::successResponse($surfers);
    }

    public function createSurfer(SurferCreateRequest  $request): JsonResponse
    {
        $request->validated();
        $surfer = $this->surferService->createSurfer($request);
        return Response::createResponse($surfer);
    }
}
