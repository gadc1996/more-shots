<?php namespace App\Http\Controllers;

use App\Repositories\WaiterRepositoryInterface;
use App\Http\Requests\WaiterStoreRequest;
use App\Http\Requests\WaiterUpdateRequest;
use App\Http\Resources\WaiterCollection;
use App\Http\Resources\WaiterResource;
use Illuminate\Http\JsonResponse;

class WaiterController extends Controller
{
    private $repository;

    public function __construct(WaiterRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        $resource = $this->repository->index();
        $response = (new WaiterCollection($resource))->response();
        return $response->setStatusCode(200);
    }

    public function store(WaiterStoreRequest $request): JsonResponse
    {
        $resource = $this->repository->store($request->validated());
        $response = (new WaiterResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function show($id): JsonResponse
    {
        $resource = $this->repository->show($id);
        $response = (new WaiterResource($resource))->response();
        return $response->setStatusCode(200);
    }

    public function update(WaiterUpdateRequest $request, $id): JsonResponse
    {
        $resource = $this->repository->update($request->validated(), $id);
        $response = (new WaiterResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function destroy($id): JsonResponse
    {
        $resource = $this->repository->destroy($id);
        $response = (new WaiterResource($resource))->response();
        return $response->setStatusCode(200);
    }
}
