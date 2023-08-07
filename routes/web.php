<?php

    use App\Http\Controllers\CarController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\UsersController;
    use App\Http\Middleware\Authe;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', [CarController::class, 'index'])->middleware('authe');

    Route::middleware('authe')->group( function (){
    Route::resource('/users', UsersController::class);
    Route::resource('products', ProductController::class);
    Route::resource('cars', CarController::class);
    });
Route::get('/email', function () {
    return new App\Mail\CarsCreated();
});
