<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Customer;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdminCanListCustomers()
    {
        $response = $this->get('/api/customers')
                         ->assertOk();
    }

    public function testAdminCanCreateCustomer()
    {
        $payload = factory(Customer::class)->make()->toArray();

        $response = $this->post('/api/customers', $payload)
                         ->assertCreated();

        $this->assertDatabaseHas('customers', $payload);
    }

    public function testAdminCanDeleteCustomer()
    {
        $payload = factory(Customer::class)->make()->toArray();

        $response = $this->post('/api/customers', $payload);

        $response = json_decode($response->getContent());

        $this->delete("api/customers/$response->id");
        $this->assertDatabaseMissing('customers', [
            'id' => $response->id,
        ]);
    }

    public function testAdminCanFindCustomer()
    {
        $payload = factory(Customer::class)->make()->toArray();

        $resource= json_decode($this->post('/api/customers', $payload)->getContent());

        $response = $this->get("api/customers/$resource->id")
            ->assertOk();

        $response = json_decode($response->getContent());
        $this->assertEquals($resource, $response);
    }

    public function testAdminCanUpdateCustomer()
    {
        $payload = factory(Customer::class)->make()->toArray();
        $updatePayload = factory(Customer::class)->make()->toArray();

        $resource = json_decode(
            $this->post('api/customers', $payload)
                 ->getContent()
        );

        $response = $this->put("api/customers/$resource->id", $updatePayload)
                         ->assertCreated();
    }

}
