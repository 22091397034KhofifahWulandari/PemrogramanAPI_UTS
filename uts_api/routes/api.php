<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddressController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/users', [UserController::class, 'register']);
Route::post('/users/login', [UserController::class, 'login']);

Route::get('/users/getupdate', [UserController::class, 'get']);
Route::patch('/users/getupdate', [UserController::class, 'update']);
Route::delete('/users/logout', [UserController::class, 'logout']);


Route::post('/contacts', [ContactController::class, 'create']);
Route::get('/contacts', [ContactController::class, 'search']);
Route::put('/contacts/{id}', [ContactController::class, 'update']);
Route::get('/contacts/{id}', [ContactController::class, 'get']);
Route::delete('/contacts/{id}', [ContactController::class, 'remove']);

Route::post('/contacts/{idContact}/addresses', [AddressController::class, 'create']);
Route::get('/api/contacts/{idContact}/addresses/{idAddress}', [AddressController::class, 'search']);
Route::put('/contacts/{idContact}/addresses/{idAddress}', [AddressController::class, 'update']);
Route::delete('/contacts/{idContact}/addresses/{idAddress}', [AddressController::class, 'remove']);
