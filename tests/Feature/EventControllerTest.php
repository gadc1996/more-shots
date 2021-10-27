<?php namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Event;
use App\Traits\CrudTestMethodsTrait;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;
    use CrudTestMethodsTrait;

    private $route = '/api/events/';
    private $databaseTable = 'events';

    public function setUp(): void
    {
        parent::setUp();

        $this->model = Event::class;
        $this->setFactories();
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
            'id' => $resource->data->id,
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
