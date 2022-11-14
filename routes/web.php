<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\Admin\AppController;
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

Route::get('/', [AppController::class, 'login'])->name('login');

Route::post('login', [AuthController::class, 'authenticate']);

/** Routes Admin */
Route::prefix('view/admin')->group(function () {
    Route::get('/vendedores', function () {
        return view('/usuarios/admin/vendedores');
    });
    Route::get('/clientes', function () {
        return view('/usuarios/admin/clientes');
    });
});

/** Views */
Route::get('/view/admin/index', function () {
    return view('usuarios/admin/index');
});
Route::get('/view/admin/vendedores/{token}', [AppController::class, 'vendedores'])->name('vendedores');