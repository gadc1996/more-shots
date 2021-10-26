<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse as TestingTestResponse;

use App\Waiter;

class WaiterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->model = Waiter::class;
        $this->route = '/api/waiters/';
        $this->databaseTable = 'waiters';

        $this->factory = factory($this->model)->make()->toArray();
        $this->updateFactory = factory($this->model)->make()->toArray();
    }

    private function createResource(): TestingTestResponse
    {
        return $this->post($this->route, $this->factory);
    }

    private function deleteResource($resource): TestingTestResponse
    {
        return $this->delete($this->route . $resource->id);
    }

    private function findResource($resource): TestingTestResponse
    {
        return $this->get($this->route . $resource->id);
    }

    private function updateResource($resource): TestingTestResponse
    {
        return $this->put($this->route . $resource->id, $this->updateFactory);
    }

    public function testAdminCanListWaiters(): void
    {
        $this->get($this->route)->assertOk();
    }

    public function testAdminCanCreateWaiter(): void
    {
        $this->createResource()->assertCreated();
    }

    public function testAdminCanDeleteWaiter(): void
    {
        $resource = json_decode($this->createResource()->getContent());

        $this->deleteResource($resource);
        
        $this->assertDatabaseMissing($this->databaseTable, [
            'id' => $resource->id,
        ]);
    }

    public function testAdminCanFindWaiter(): void
    {
        $resource = json_decode($this->createResource()->getContent());

        $response =  $this->findResource($resource)->assertOk();
        $response = json_decode($response->getContent());

        $this->assertEquals($resource, $response);
    }

    public function testAdminCanUpdateWaiter(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $this->updateResource($resource)->assertCreated();
    }
}

