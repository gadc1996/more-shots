<?php namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\CustomerReference;
use App\Traits\CrudTestMethodsTrait;

class CustomerReferenceControllerTest extends TestCase
{
    use RefreshDatabase;
    use CrudTestMethodsTrait;

    private $route = '/api/customer-references/';
    private $databaseTable = 'customer_references';
    
    private $jsonStructure = [
        'data',
        'links',
        'meta',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->model = CustomerReference::class;
        $this->setFactories();
    }

    public function testAdminCanListCustomerReference(): void
    {
        $this->get($this->route)->assertOk()
             ->assertOk()
             ->assertHeader('Content-Type', 'application/json')
             ->assertJsonStructure($this->jsonStructure);
    }

    public function testAdminCanCreateCustomerReference(): void
    {
        $this->createResource()->assertCreated();
    }

    public function testAdminCanDeleteCustomerReference(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $this->deleteResource($resource);
        $this->assertDatabaseMissing($this->databaseTable, [
            'id' => $resource->data->id,
        ]);
    }

    public function testAdminCanFindCustomerReference(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $response =  $this->findResource($resource)->assertOk();
        $response = json_decode($response->getContent());
        $this->assertEquals($resource, $response);
    }

    public function testAdminCanUpdateCustomerReference(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $this->updateResource($resource)->assertCreated();
    }
}
