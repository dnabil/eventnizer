<?php

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/register', [UserController::class, 'registerView'])->middleware('guest');
Route::post('/register', [UserController::class, 'create'])->middleware('guest');
Route::get('/login', [UserController::class, 'loginView'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/register-merchant', [MerchantController::class, 'registerView'])->middleware('auth');
Route::post('/register-merchant', [MerchantController::class, 'create'])->middleware('auth');

Route::get('/merchant/{Merchant:slug}', [MerchantController::class, 'index']); //profil merchant
Route::get('/merchant-edit', [MerchantController::class, 'editView']); //khusus merchant
Route::get('/product', [ProductController::class, 'index']);

Route::get('/product-add', [ProductController::class, 'create']);
Route::post('/product-add', [ProductController::class, 'store']);
Route::post('/product-delete', [ProductController::class, 'destroy']);


// Route::get('/debug', function () {
//     return "berhasil!";
// });






Route::get('/playground', function () {
    return view('components.card-slider');
});
Route::get('/playground2', function () {
    return view('playground2');
});
//DROPDOWN DEPENDENCIES FROM LARAVOLT/INDONESIA
Route::get('/cities', function (Request $request) {
    return \Indonesia::findProvince($request->id, ['cities'])->cities->pluck('name', 'id');
})->name('/cities');
Route::get('districts', function (Request $request) {
    return \Indonesia::findCity($request->id, ['districts'])->districts->pluck('name', 'id');
})->name('/districts');
Route::get('villages', function (Request $request) {
    return \Indonesia::findDistrict($request->id, ['villages'])->villages->pluck('name', 'id');
})->name('/villages');
//end of DROPDOWN DEPENDENCIES FROM LARAVOLT/INDONESIA