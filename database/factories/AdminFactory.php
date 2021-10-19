<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Illuminate\Support\Facades\Hash;

$factory->define(Admin::class, function () {
    return [
        'email' => env('ADMIN_EMAIL', 'admin@example.com'),
        'password' => Hash::make(env('ADMIN_PASSWORD', 'admin')),
    ];
});
