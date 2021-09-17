<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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

Route::redirect('/', '/products');

Route::resource('products', ProductController::class);

Route::get('/auth/redirect', [AuthController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/callback', [AuthController::class, 'callback'])->name('auth.callback');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('/welcome', 'welcome');

Route::get('/sobre', function () {
    return 'Página sobre ...';
});

Route::get('/user/{name}', function () {
    $username = request('name');
    return 'Hello, ' . $username . '!';
});
