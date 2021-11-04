<?php namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

use App\Repositories\CustomerReferenceRepository;
use App\Http\Requests\CustomerReferenceStoreRequest;
use App\Http\Requests\CustomerReferenceUpdateRequest;
use App\Http\Resources\CustomerReferenceCollection;
use App\Http\Resources\CustomerReferenceResource;

class CustomerReferenceController extends Controller
{
    private $repository;

    public function __construct(CustomerReferenceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        $resource = $this->repository->index();
        $response = (new CustomerReferenceCollection($resource))->response();
        return $response->setStatusCode(200);
    }

    public function store(CustomerReferenceStoreRequest $request): JsonResponse
    {
        \Log::info('Inside Store');
        $resource = $this->repository->store($request->validated());
        $response = (new CustomerReferenceResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function show($id): JsonResponse
    {
        $resource = $this->repository->show($id);
        $response = (new CustomerReferenceResource($resource))->response();
        return $response->setStatusCode(200);
    }

    public function update(CustomerReferenceUpdateRequest $request, $id): JsonResponse
    {
        $resource = $this->repository->update($request->validated(), $id);
        $response = (new CustomerReferenceResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function destroy($id): JsonResponse
    {
        $resource = $this->repository->destroy($id);
        $response = (new CustomerReferenceResource($resource))->response();
        return $response->setStatusCode(200);
    }
}
