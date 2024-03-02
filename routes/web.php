<?php

use App\Http\Admin\AdminController;
use App\Http\User\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::prefix('admin/')->group(function(){
    Route::any('',[AdminController::class,'show'])->name('admin.index');
    Route::any('/store',[AdminController::class,'store'])->name('admin.store');
});
Route::prefix('user/')->group(function(){
    Route::any('',[UserController::class,'show'])->name('user.index');
    Route::any('add-to-cart',[UserController::class,'addToCart'])->name('user.cart.add');
    Route::any('get-cart',[UserController::class,'getUserCart'])->name('user.cart.get');
    Route::any('delete-cart',[UserController::class,'deleteUserCart'])->name('user.cart.delete');
});

