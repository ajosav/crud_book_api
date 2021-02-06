<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\BooksController;
use Illuminate\Http\Request;
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

Route::group(['prefix' => 'v1'], function () {
    Route::name('users.')->prefix('users')->group(function () {
        Route::post('create', [AuthController::class, 'store'])->name('create');
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });

    Route::resource('books', 'App\Http\Controllers\Api\BooksController', ['except' => ['create', 'edit']]);
});