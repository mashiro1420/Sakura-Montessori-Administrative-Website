<?php

use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\QLHocSinhController;
use App\Http\Controllers\QLNhanVienController;
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
Route::get('/', function () {
    return view('Dang_nhap.dang_nhap');
});
Route::get('dang_nhap',[DangNhapController::class, 'viewDangNhap'])->name('dang_nhap');
Route::post('xl_dang_nhap',[DangNhapController::class, 'login']);

//Nhan vien
Route::get('ql_nv',[QLNhanVienController::class, 'viewQuanLy'])->name('ql_nv');
Route::get('them_nv',[QLNhanVienController::class, 'viewThem'])->name('them_nv');
Route::get('sua_nv',[QLNhanVienController::class, 'viewSua'])->name('sua_nv');
<<<<<<< HEAD
Route::get('cap_nhat_ttds',[QLNhanVienController::class, 'viewCapNhatTTDS'])->name('cap_nhat_ttds');
Route::get('cap_nhat_tthn', [QLNhanVienController::class, 'viewCapNhatTTHN'])->name('cap_nhat_tthn');
Route::get('cap_nhat_ttlh', [QLNhanVienController::class, 'viewCapNhatTTLH'])->name('cap_nhat_ttlh');
Route::get('cap_nhat_ttbc', [QLNhanVienController::class, 'viewCapNhatTTBC'])->name('cap_nhat_ttbc');

=======
//----------------------------
>>>>>>> bc6070d6846da34ceb881fa240a5eaa3b30920fb
Route::post('xl_them_nv',[QLNhanVienController::class, 'xlThem']);
Route::post('xl_sua_nv',[QLNhanVienController::class, 'xlSua']);
Route::post('xl_ttds',[QLNhanVienController::class, 'xlTTDS']);
Route::post('xl_tthn',[QLNhanVienController::class, 'xlTTHN']);
Route::post('xl_ttlh',[QLNhanVienController::class, 'xlTTLH']);
Route::post('xl_ttbc',[QLNhanVienController::class, 'xlTTBC']);