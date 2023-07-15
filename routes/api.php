<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\EntityController;
use App\Models\Entity;
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

Route::get('/',function(){
    return 'hello world';
});

Route::apiResource('/entity', EntityController::class);
Route::apiResource('/contract', ContractController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
