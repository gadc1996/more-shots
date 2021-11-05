<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Furnishing;
use App\Traits\CrudTestMethodsTrait;

class FurnishingControllerTest extends TestCase
{
    use RefreshDatabase;
    use CrudTestMethodsTrait;

    private $route = '/api/furnishings/';
    private $databaseTable = 'furnishings';
    
    private $jsonStructure = [
        'data',
        'links',
        'meta',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->model = Furnishing::class;
        $this->setFactories();
    }

    public function testAdminCanListFurnishings(): void
    {
        $this->get($this->route)->assertOk()
             ->assertOk()
             ->assertHeader('Content-Type', 'application/json')
             ->assertJsonStructure($this->jsonStructure);
    }

    public function testAdminCanCreateFurnishing(): void
    {
        $this->createResource()->assertCreated();
    }

    public function testAdminCanDeleteFurnishing(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $this->deleteResource($resource);
        $this->assertDatabaseMissing($this->databaseTable, [
            'id' => $resource->data->id,
        ]);
    }

    public function testAdminCanFindFurnishing(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $response =  $this->findResource($resource)->assertOk();
        $response = json_decode($response->getContent());
        $this->assertEquals($resource, $response);
    }

    public function testAdminCanUpdateFurnishing(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $this->updateResource($resource)->assertCreated();
    }
}
