<?php

namespace App\Http\Controllers;

use App\Repositories\ShotRepository;
use App\Http\Requests\ShotStoreRequest;
use App\Http\Requests\ShotUpdateRequest;
use App\Http\Resources\ShotCollection;
use App\Http\Resources\ShotResource;
use Illuminate\Http\JsonResponse;

class ShotController extends Controller
{
    private $repository;

    public function __construct(ShotRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        $resource = $this->repository->index();
        $response = (new ShotCollection($resource))->response();
        return $response->setStatusCode(200);
    }

    public function store(ShotStoreRequest $request): JsonResponse
    {
        \Log::info($request->validated());
        $resource = $this->repository->store($request->validated());
        $response = (new ShotResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function show($id): JsonResponse
    {
        $resource = $this->repository->show($id);
        $response = (new ShotResource($resource))->response();
        return $response->setStatusCode(200);
    }

    public function update(ShotUpdateRequest $request, $id): JsonResponse
    {
        $resource = $this->repository->update($request->validated(), $id);
        $response = (new ShotResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function destroy($id): JsonResponse
    {
        $resource = $this->repository->destroy($id);
        $response = (new ShotResource($resource))->response();
        return $response->setStatusCode(200);
    }
}
