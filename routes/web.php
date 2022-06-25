<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::prefix('user')->group(function (){
    Route::get('/shop/{id}',[UserController::class, 'getShop'])->name('shop');
    Route::get('/shop', function(){
        return redirect(route('shop', ['id' => '1']));
    });
    Route::get('/shop-cart',[UserController::class, 'getShopCart'])->name('shopcart');
    Route::get('/product-details/{id}',[UserController::class, 'getProductDetail'])->name('productdetail');
    Route::get('/check-out',[UserController::class, 'getCheckOut'])->name('checkout');
    Route::get('/add-cart/{id}', [UserController::class, 'getAddCart'])->name('addcart');
    Route::get('/delete-item/{id}', [UserController::class, 'getDeleteItem'])->name('deleteitem');
    Route::post('/save-all', [UserController::class, 'postSaveAllItem']);
    Route::post('/order', [UserController::class, 'postOrder'])->name('order');
});


