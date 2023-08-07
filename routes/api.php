<?php

    use App\Http\Controllers\ApiCar\CarApiController;
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
    Route::apiResource('/cars', CarApiController::class);
    Route::get('users/{user}/cars', [CarApiController::class, 'carsPerUser']);
//    Route::get('/cars', [CarApiController::class, 'index']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
