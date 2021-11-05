<?php

namespace App\Http\Controllers;

use App\Repositories\FurnishingRepository;
use App\Http\Resources\FurnishingResource;
use App\Http\Resources\FurnishingCollection;
use App\Http\Requests\FurnishingStoreRequest;
use App\Http\Requests\FurnishingUpdateRequest;

class FurnishingController extends Controller
{

    public function __construct(FurnishingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $resource = $this->repository->index();
        $response = (new FurnishingCollection($resource))->response();
        return $response->setStatusCode(200);
    }

    public function store(FurnishingStoreRequest $request)
    {
        $resource = $this->repository->store($request->validated());
        $response = (new FurnishingResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function show($id)
    {
        $resource = $this->repository->show($id);
        $response = (new FurnishingResource($resource))->response();
        return $response->setStatusCode(200);
    }

    public function update(FurnishingUpdateRequest $request, $id)
    {
        $resource = $this->repository->update($request->validated(), $id);
        $response = (new FurnishingResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function destroy($id)
    {
        $resource = $this->repository->destroy($id);
        $response = (new FurnishingResource($resource))->response();
        return $response->setStatusCode(200);
    }
}
