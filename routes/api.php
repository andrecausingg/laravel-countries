<?php

use App\Http\Controllers\FlagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Display ALl Data
Route::get('index', [FlagController::class, 'index']);
// Store Data
Route::post('store', [FlagController::class, 'store']);
// DIsplay want to update data
Route::post('edit/{id}', [FlagController::class, 'edit']);
// Update Data
Route::post('update/{id}', [FlagController::class, 'update']);
// Destroy Data
Route::post('destroy/{id}', [FlagController::class, 'destroy']);

