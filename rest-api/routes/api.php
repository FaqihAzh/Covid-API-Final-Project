<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CovidController;

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

// Covid-19 Routes

// GET method - All data
Route::get('/patients', [CovidController::class, 'index']);

// POST method - Add data
Route::post('/patients', [CovidController::class, 'store']);

// GET method - Detail data by id
Route::get('/patients/{id}', [CovidController::class, 'show']);

// PUT method - Update data by id
Route::put('/patients/{id}', [CovidController::class, 'update']);

// DELETE method - Delete data by id
Route::delete('/patients/{id}', [CovidController::class, 'destroy']);

// GET method - Search data by name
Route::get('/patients/search/{name}', [CovidController::class, 'search']);

// GET method - Status data = Positive
Route::get('/patients/status/positive', [CovidController::class, 'positive']);

// GET method - Status data = Recovered
Route::get('/patients/status/recovered', [CovidController::class, 'recovered']);

// GET method - Status data = Dead
Route::get('/patients/status/dead', [CovidController::class, 'dead']);
