<?php namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Shot;
use App\Traits\CrudTestMethodsTrait;

class ShotControllerTest extends TestCase
{
    use RefreshDatabase;
    use CrudTestMethodsTrait;

    private $route = '/api/shots/';
    private $databaseTable = 'shots';

    private $jsonStructure = [
        'data',
        'links',
        'meta',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->model = Shot::class;
        $this->setFactories();
    }

    public function testAdminCanListShots(): void
    {
        $this->get($this->route)->assertOk()
             ->assertOk()
             ->assertHeader('Content-Type', 'application/json')
             ->assertJsonStructure($this->jsonStructure);
    }

    public function testAdminCanCreateShot(): void
    {
        $this->createResource()->assertCreated();
    }

    public function testAdminCanDeleteShot(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $this->deleteResource($resource);
        $this->assertDatabaseMissing($this->databaseTable, [
            'id' => $resource->data->id,
        ]);
    }

    public function testAdminCanFindShot(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $response =  $this->findResource($resource)->assertOk();
        $response = json_decode($response->getContent());
        $this->assertEquals($resource, $response);
    }

    public function testAdminCanUpdateShot(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $this->updateResource($resource)->assertCreated();
    }
}
