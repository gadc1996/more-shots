<?php namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Customer;
use App\Traits\CrudTestMethodsTrait;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;
    use CrudTestMethodsTrait;

    private $route = '/api/customers/';
    private $databaseTable = 'customers';

    private $jsonStructure = [
        'data',
        'links',
        'meta',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->model = Customer::class;
        $this->setFactories();
    }

    public function testAdminCanListCustomers(): void
    {
        $this->get($this->route)
             ->assertOk()
             ->assertHeader('Content-Type', 'application/json')
             ->assertJsonStructure($this->jsonStructure);
    }

    public function testAdminCanCreateCustomer(): void
    {
        $this->createResource()->assertCreated();
    }

    public function testAdminCanDeleteCustomer(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $this->deleteResource($resource);
        $this->assertDatabaseMissing($this->databaseTable, [
            'id' => $resource->data->id,
        ]);
    }

    public function testAdminCanFindCustomer(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $response =  $this->findResource($resource)->assertOk();
        $response = json_decode($response->getContent());
        $this->assertEquals($resource, $response);
    }

    public function testAdminCanUpdateCustomer(): void
    {
        $resource = json_decode($this->createResource()->getContent());
        $this->updateResource($resource)->assertCreated();
    }
}
