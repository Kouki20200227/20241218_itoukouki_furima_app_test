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
    Route::get('/sell', [AuthorController::class, 'sell']);
});

Route::get('/', [AuthorController::class, 'index']);
Route::get('/mypage/profile', [AuthorController::class, 'profile']);
Route::get('/sell', [AuthorController::class, 'sell']);
Route::get('/item', [AuthorController::class, 'item']);