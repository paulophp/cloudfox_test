<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PagamentoBoletoController;

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
    return view('mercadopago_home');
});

Route::post('/pagar', [PagamentoController::class, 'processar']);

Route::get('/boleto', function () {
    return view('mercadopago_boleto');
});

Route::get('/boleto_obrigado', function () {
    return view('boleto_obrigado');
});

Route::get('/cartao', function () {
    return view('mercadopago_cartao');
});

Route::post('/boleto', [PagamentoBoletoController::class, 'processar']);
