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
    // トップページ処理
    Route::get('/', [AuthorController::class, 'user_index']);

    // プロフィール処理
    Route::get('mypage', [ProfileController::class, 'mypage_index']);
    Route::get('/mypage/profile', [ProfileController::class, 'profile_index']);
    Route::post('/mypage/profile', [ProfileController::class, 'profile_store']);
    Route::put('/mypage/profile', [ProfileController::class, 'profile_update']);

    // 商品出品処理
    Route::get('/sell', [ItemController::class, 'sell_index']);
    Route::post('/sell', [ItemController::class, 'sell_store']);

    // 商品購入処理
    Route::get('/purchase/{item_id}', [PurchaseController::class, 'purchase_index']);
    Route::post('/purchase', [PurchaseController::class, 'purchase_store']);
    Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'address_index']);
    Route::post('/purchase/address', [PurchaseController::class, 'address_store']);
});

// トップページ画面ルート処理
Route::get('/', [AuthorController::class, 'index']);
// 商品詳細画面ルート処理
Route::get('/item/{item_id}', [ItemController::class, 'item_index']);
Route::post('/item', [ItemController::class, 'item_comment']);

