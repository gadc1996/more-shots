<?php namespace App\Traits;

use Illuminate\Testing\TestResponse as TestingTestResponse;

trait CrudTestMethodsTrait{
    protected function createResource(): TestingTestResponse
    {
        return $this->post($this->route, $this->factory);
    }

    protected function deleteResource($resource): TestingTestResponse
    {
        return $this->delete($this->route . $resource->data->id);
    }

    protected function findResource($resource): TestingTestResponse
    {
        return $this->get($this->route . $resource->data->id);
    }

    protected function updateResource($resource): TestingTestResponse
    {
        return $this->put($this->route . $resource->data->id, $this->updateFactory);
    }

    protected function setFactory()
    {
        $this->factory = factory($this->model)->make()->toArray();
    }

    protected function setUpdateFactory()
    {
        $this->updateFactory = factory($this->model)->make()->toArray();
    }

    protected function setFactories()
    {
        $this->setFactory();
        $this->setUpdateFactory();
    }
}



