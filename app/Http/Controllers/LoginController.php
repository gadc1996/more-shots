<?php 

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Repositories\LoginRepositoryInterface;

class LoginController extends Controller
{
    private $repository;

    public function __construct(LoginRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(LoginRequest $request)
    {
        return $this->repository->login($request->validated());
    }
}
