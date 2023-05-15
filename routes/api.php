<?php

use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\DealController;
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

//Route::prefix('accounts')->as('accounts')->controller(AccountController::class)->group(function () {
//    Route::get('index', 'index')->name('index');
//});

Route::prefix('accounts')->controller(AccountController::class)->group(function () {
    Route::get('/', 'index');
    Route::POST('/', 'store');
});
Route::prefix('deals')->controller(DealController::class)->group(function() {
    Route::get('/', 'index');
    Route::POST('/', 'store');
});
