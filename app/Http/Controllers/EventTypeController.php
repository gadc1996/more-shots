<?php namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

use App\Repositories\EventTypeRepositoryInterface;
use App\Http\Requests\EventTypeStoreRequest;
use App\Http\Requests\EventTypeUpdateRequest;

class EventTypeController extends Controller
{
    private $repository;

    public function __construct(EventTypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->repository->index(), 200);
    }

    public function store(EventTypeStoreRequest $request): JsonResponse
    {
        return response()->json($this->repository->store($request->validated()), 201);
    }

    public function show($id): JsonResponse
    {
        return response()->json($this->repository->show($id), 200);
    }

    public function update(EventTypeUpdateRequest $request, $id): JsonResponse
    {
        return response()->json($this->repository->update($request->validated(), $id), 201);
    }

    public function destroy($id): JsonResponse
    {
        return response()->json($this->repository->destroy($id), 200);
    }
}
