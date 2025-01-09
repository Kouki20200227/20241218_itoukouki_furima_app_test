<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
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
    // トップページ表示処理
    Route::get('/', [AuthorController::class, 'user_index']);
    Route::get('/sell', [AuthorController::class, 'sell']);
    // プロフィール処理
    Route::get('/mypage/profile', [ProfileController::class, 'profile_index']);
    Route::post('/mypage/profile', [ProfileController::class, 'profile_store']);
    // 商品購入画面ルート処理
    Route::get('/purchase', [PurchaseController::class, 'purchase_index']);
    Route::post('/purchase', [PurchaseController::class, 'purchase_store']);
    // 送付先住所変更画面ルート処理
    Route::get('/purchase/address', [AuthorController::class, 'address_index']);
});

// トップページ画面ルート処理
Route::get('/', [AuthorController::class, 'index']);
// 商品詳細画面ルート処理
Route::get('/item/{item_id}', [ItemController::class, 'item_index']);
Route::post('/item', [ItemController::class, 'item_comment']);

