<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Admin;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = factory(Admin::class)->create();

    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdminCanLogin(): void
    {
        $adminCredentials = [
            'email' => env('ADMIN_EMAIL', 'admin@example.com'),
            'password' => env('ADMIN_PASSWORD', 'admin'),
        ];

        $response = $this->post('/api/login', $adminCredentials)
                         ->assertOk();
    }
}
