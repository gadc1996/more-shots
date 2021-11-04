<?php namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

use App\Repositories\EventTypeRepositoryInterface;
use App\Http\Requests\EventTypeStoreRequest;
use App\Http\Requests\EventTypeUpdateRequest;
use App\Http\Resources\EventTypeCollection;
use App\Http\Resources\EventTypeResource;

class EventTypeController extends Controller
{
    private $repository;

    public function __construct(EventTypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        $resource = $this->repository->index();
        $response = (new EventTypeCollection($resource))->response();
        return $response->setStatusCode(200);
    }

    public function store(EventTypeStoreRequest $request): JsonResponse
    {
        $resource = $this->repository->store($request->validated());
        $response = (new EventTypeResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function show($id): JsonResponse
    {
        $resource = $this->repository->show($id);
        $response = (new EventTypeResource($resource))->response();
        return $response->setStatusCode(200);
    }

    public function update(EventTypeUpdateRequest $request, $id): JsonResponse
    {
        $resource = $this->repository->update($request->validated(), $id);
        $response = (new EventTypeResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function destroy($id): JsonResponse
    {
        $resource = $this->repository->destroy($id);
        $response = (new EventTypeResource($resource))->response();
        return $response->setStatusCode(200);
    }
}
