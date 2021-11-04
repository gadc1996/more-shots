<?php 

namespace App\Repositories;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

use App\Admin;

class LoginRepository implements LoginRepositoryInterface
{
    protected $model;

    public function __construct(Admin $admin)
    {
        $this->model = $admin;
    }

    public function login(array $credentials): jsonResponse
    {
        $admin = Admin::where('email', $credentials['email'])->firstOrFail();
        if (Hash::check($credentials['password'], $admin->password)) {
            return response()->json(['data' => $admin]);
        } else {
            return response()->json([], 401);
        }
    }
}
