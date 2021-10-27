<?php namespace App\Http\Controllers;

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

    public function index()
    {
        \Log::info('inside index');
        $resource = $this->repository->index();
        $response = (new EventTypeCollection($resource))->response();
        return $response->setStatusCode(200);
    }

    public function store(EventTypeStoreRequest $request)
    {
        $resource = $this->repository->store($request->validated());
        $response = (new EventTypeResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function show($id)
    {
        $resource = $this->repository->show($id);
        $response = (new EventTypeResource($resource))->response();
        return $response->setStatusCode(200);
    }

    public function update(EventTypeUpdateRequest $request, $id) 
    {
        $resource = $this->repository->update($request->validated(), $id);
        $response = (new EventTypeResource($resource))->response();
        return $response->setStatusCode(201);
    }

    public function destroy($id)
    {
        $resource = $this->repository->destroy($id);
        $response = (new EventTypeResource($resource))->response();
        return $response->setStatusCode(200);
    }
}
