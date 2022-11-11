<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\V1\AuthController;
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
    return view('login');
});

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

