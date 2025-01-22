<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Models\Profile;
use App\Models\Purchase;
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
    // プロフィール処理
    Route::get('mypage', [AuthorController::class, 'mypage_index']);
    Route::get('/mypage/profile', [AuthorController::class, 'profile_index']);
    Route::post('/mypage/profile', [AuthorController::class, 'profile_store']);
    Route::put('/mypage/profile', [AuthorController::class, 'profile_update']);

    // 商品出品処理
    Route::get('/sell', [AuthorController::class, 'sell_index']);
    Route::post('/sell', [AuthorController::class, 'sell_store']);

    // 商品購入処理
    Route::get('/purchase/{item_id}', [AuthorController::class, 'purchase_index']);
    Route::post('/purchase', [AuthorController::class, 'purchase_store']);
    Route::get('/purchase/address/{item_id}', [AuthorController::class, 'address_index']);
    Route::post('/purchase/address', [AuthorController::class, 'address_store']);

    // 商品詳細処理
    Route::post('/item/{item_id}', [AuthorController::class, 'item_store']);

});

// トップページ処理
Route::get('/', [AuthorController::class, 'user_index']);
// 商品詳細画面ルート処理
Route::get('/item/{item_id}', [AuthorController::class, 'item_index'])->name('item.index');

