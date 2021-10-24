<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Customer;
use Illuminate\Testing\TestResponse as TestingTestResponse;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function setUp(): void
    {
        parent::setUp();

        $this->model = Customer::class;
        $this->route = '/api/customers/';
        $this->databaseTable = 'customers';

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

    public function testAdminCanListCustomers(): void
    {
        $this->get($this->route)->assertOk();
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
            'id' => $resource->id,
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
