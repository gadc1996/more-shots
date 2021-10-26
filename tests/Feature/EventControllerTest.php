<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse as TestingTestResponse;

use App\Event;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->model = Event::class;
        $this->route = '/api/events/';
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

    public function testAdminCanListEvents(): void
    {
        $this->get($this->route)->assertOk();
    }

    public function testAdminCanCreateEvents(): void
    {
        $this->createResource()->assertCreated();
    }

    public function testAdminCanDeleteEvents(): void
    {
        $resource = json_decode($this->createResource()->getContent());

        $this->deleteResource($resource);
        
        $this->assertDatabaseMissing($this->databaseTable, [
            'id' => $resource->id,
        ]);
    }

    public function testAdminCanFindEvents(): void
    {
        $resource = json_decode($this->createResource()->getContent());

        $response =  $this->findResource($resource)->assertOk();
        $response = json_decode($response->getContent());

        $this->assertEquals($resource, $response);
    }

    public function testAdminCanUpdateEvents(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $this->updateResource($resource)->assertCreated();
    }
}
