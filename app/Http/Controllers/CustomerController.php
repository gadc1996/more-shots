<?php namespace App\Http\Controllers;

use App\Repositories\CustomerRepositoryInterface;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    private $repository;

    public function __construct(CustomerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $resource = $this->repository->index();
        $response = (new CustomerCollection($resource))->response();
        return $response->setStatusCode(200);
    }

    public function store(CustomerStoreRequest $request)
    {
        $resource = $this->repository->store($request->validated());
        $response = (new CustomerResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function show($id)
    {
        $resource = $this->repository->show($id);
        $response = (new CustomerResource($resource))->response();
        return $response->setStatusCode(200);
    }

    public function update(CustomerUpdateRequest $request, $id) 
    {
        $resource = $this->repository->update($request->validated(), $id);
        $response = (new CustomerResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function destroy($id)
    {
        $resource = $this->repository->destroy($id);
        $response = (new CustomerResource($resource))->response();
        return $response->setStatusCode(200);
    }
}
