<?php

use App\Http\Controllers\DangNhapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('dang_nhap',[DangNhapController::class, 'index'])->name('dang_nhap');
Route::post('xu_ly_dang_nhap',[DangNhapController::class, 'login']);
