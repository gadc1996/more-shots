<?php namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\EventType;
use App\Traits\CrudTestMethodsTrait;

class EventTypeControllerTest extends TestCase
{
    use RefreshDatabase;
    use CrudTestMethodsTrait;

    private $route = '/api/events/types/';
    private $databaseTable = 'events';

    public function setUp(): void
    {
        parent::setUp();
        $this->model = EventType::class;
        $this->setFactories();
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
