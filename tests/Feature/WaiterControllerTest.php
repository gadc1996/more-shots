<?php namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Waiter;
use App\Traits\CrudTestMethodsTrait;

class WaiterControllerTest extends TestCase
{
    use RefreshDatabase;
    use CrudTestMethodsTrait;

    private $route = '/api/waiters/';
    private $databaseTable = 'waiters';

    public function setUp(): void
    {
        parent::setUp();
        $this->model = Waiter::class;
        $this->setFactories();
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
            'id' => $resource->data->id,
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
