<?php

use App\Http\Controllers\Penjualan\PenjualanController;
use Illuminate\Support\Facades\Route;


Route::post('/simpanpenjualan', [PenjualanController::class, 'simpan']);


