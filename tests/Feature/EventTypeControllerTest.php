<?php namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\EventType;
use App\Traits\CrudTestMethodsTrait;

class EventTypeControllerTest extends TestCase
{
    use RefreshDatabase;
    use CrudTestMethodsTrait;

    private $route = '/api/event-types/';
    private $databaseTable = 'event_types';
    
    private $jsonStructure = [
        'data',
        'links',
        'meta',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->model = EventType::class;
        $this->setFactories();
    }

    public function testAdminCanListEventTypes(): void
    {
        $this->get($this->route)->assertOk()
             ->assertOk()
             ->assertHeader('Content-Type', 'application/json')
             ->assertJsonStructure($this->jsonStructure);
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
            'id' => $resource->data->id,
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
