<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

use App\Repositories\WaiterRepositoryInterface;
use App\Http\Requests\WaiterStoreRequest;
use App\Http\Requests\WaiterUpdateRequest;

class WaiterController extends Controller
{
    private $repository;

    public function __construct(WaiterRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->repository->index(), 200);
    }

    public function store(WaiterStoreRequest $request): JsonResponse
    {
        return response()->json($this->repository->store($request->validated()), 201);
    }

    public function show($id): JsonResponse
    {
        return response()->json($this->repository->show($id), 200);
    }

    public function update(WaiterUpdateRequest $request, $id): JsonResponse
    {
        return response()->json($this->repository->update($request->validated(), $id), 201);
    }

    public function destroy($id): JsonResponse
    {
        return response()->json($this->repository->destroy($id), 200);
    }
}

