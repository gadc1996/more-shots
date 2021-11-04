<?php namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

use App\Repositories\EventRepositoryInterface;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventCollection;

class EventController extends Controller
{
    private $repository;

    public function __construct(EventRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        $resource = $this->repository->index();
        $response = (new EventCollection($resource))->response();
        return $response->setStatusCode(200);
    }

    public function store(EventStoreRequest $request): JsonResponse
    {
        $resource = $this->repository->store($request->validated());
        $response = (new EventResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function show($id): JsonResponse
    {
        $resource = $this->repository->show($id);
        $response = (new EventResource($resource))->response();
        return $response->setStatusCode(200);
    }

    public function update(EventUpdateRequest $request, $id) : JsonResponse
    {
        $resource = $this->repository->update($request->validated(), $id);
        $response = (new EventResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function destroy($id): JsonResponse
    {
        $resource = $this->repository->destroy($id);
        $response = (new EventResource($resource))->response();
        return $response->setStatusCode(200);
    }
}
