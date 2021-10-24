<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

use App\Repositories\CustomerRepositoryInterface;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;

class CustomerController extends Controller
{
    private $repository;

    public function __construct(CustomerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->repository->index(), 200);
    }

    public function store(CustomerStoreRequest $request): JsonResponse
    {
        return response()->json($this->repository->store($request->validated()), 201);
    }

    public function show($id): JsonResponse
    {
        return response()->json($this->repository->show($id), 200);
    }

    public function update(CustomerUpdateRequest $request, $id): JsonResponse
    {
        return response()->json($this->repository->update($request->validated(), $id), 201);
    }

    public function destroy($id): JsonResponse
    {
        return response()->json($this->repository->destroy($id), 200);
    }
}
