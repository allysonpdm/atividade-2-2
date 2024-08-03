<?php

use App\Http\Controllers\MercadoFinanceiroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/quote/list/map-tree', [MercadoFinanceiroController::class, 'mapTree']);
Route::get('/buy', [MercadoFinanceiroController::class, 'buy']);
Route::get('/quote/list', [MercadoFinanceiroController::class, 'quoteList']);
