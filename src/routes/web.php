<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use PharIo\Manifest\Author;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthorController::class, 'index']);
});

Route::get('/', [AuthorController::class, 'index']);
Route::get('/profile', [AuthorController::class, 'profile']);