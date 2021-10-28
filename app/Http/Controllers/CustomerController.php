<?php namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

use App\Repositories\CustomerRepositoryInterface;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    private $repository;

    public function __construct(CustomerRepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        $resource = $this->repository->index();
        $response = (new CustomerCollection($resource))->response();
        return $response->setStatusCode(200);
    }

    public function store(CustomerStoreRequest $request): JsonResponse
    {
        $resource = $this->repository->store($request->validated());
        $response = (new CustomerResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function show($id): JsonResponse
    {
        $resource = $this->repository->show($id);
        $response = (new CustomerResource($resource))->response();
        return $response->setStatusCode(200);
    }

    public function update(CustomerUpdateRequest $request, $id): JsonResponse
    {
        $resource = $this->repository->update($request->validated(), $id);
        $response = (new CustomerResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function destroy($id): JsonResponse
    {
        $resource = $this->repository->destroy($id);
        $response = (new CustomerResource($resource))->response();
        return $response->setStatusCode(200);
    }
}
