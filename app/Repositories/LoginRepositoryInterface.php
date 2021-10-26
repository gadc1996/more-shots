<?php namespace App\Repositories;

use Illuminate\Http\JsonResponse;

interface LoginRepositoryInterface
{
    public function login(array $credentials): jsonResponse;
}
