<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'LoginController');
Route::apiResources([
    'customers' => 'CustomerController',
    'customer-references' => 'CustomerReferenceController',
    'waiters' => 'WaiterController',
    'events' => 'EventController',
    'event-types' => 'EventTypeController',
    'shots' => 'ShotController',
    'furnishings' => 'FurnishingController',
]);
