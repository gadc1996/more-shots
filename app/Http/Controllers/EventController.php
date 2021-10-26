<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

use App\Repositories\EventRepositoryInterface;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;

class EventController extends Controller
{
    private $repository;

    public function __construct(EventRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->repository->index(), 200);
    }

    public function store(EventStoreRequest $request): JsonResponse
    {
        return response()->json($this->repository->store($request->validated()), 201);
    }

    public function show($id): JsonResponse
    {
        return response()->json($this->repository->show($id), 200);
    }

    public function update(EventUpdateRequest $request, $id): JsonResponse
    {
        return response()->json($this->repository->update($request->validated(), $id), 201);
    }

    public function destroy($id): JsonResponse
    {
        return response()->json($this->repository->destroy($id), 200);
    }
}
