<?php namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Admin;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = Admin::class;
        $this->admin = factory($this->model)->create();
        $this->adminCredentials = [
            'email' => env('ADMIN_EMAIL', 'admin@example.com'),
            'password' => env('ADMIN_PASSWORD', 'admin'),
        ];
    }

    public function testAdminCanLogin(): void
    {
        $this->post('/api/login', $this->adminCredentials)->assertOk();
    }
}
