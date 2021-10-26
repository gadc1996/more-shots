<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse as TestingTestResponse;

use App\EventType;

class EventTypeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->model = EventType::class;
        $this->route = '/api/events/types/';
        $this->databaseTable = 'events';

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

    public function testAdminCanListEventTypes(): void
    {
        $this->get($this->route)->assertOk();
    }

    public function testAdminCanCreateEventTypes(): void
    {
        $this->createResource()->assertCreated();
    }

    public function testAdminCanDeleteEventTypes(): void
    {
        $resource = json_decode($this->createResource()->getContent());

        $this->deleteResource($resource);
        
        $this->assertDatabaseMissing($this->databaseTable, [
            'id' => $resource->id,
        ]);
    }

    public function testAdminCanFindEventTypes(): void
    {
        $resource = json_decode($this->createResource()->getContent());

        $response =  $this->findResource($resource)->assertOk();
        $response = json_decode($response->getContent());

        $this->assertEquals($resource, $response);
    }

    public function testAdminCanUpdateEventTypes(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $this->updateResource($resource)->assertCreated();
    }
}
