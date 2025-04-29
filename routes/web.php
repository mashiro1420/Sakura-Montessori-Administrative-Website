<?php

use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\QLHocSinhController;
use App\Http\Controllers\QLNhanVienController;
use App\Http\Controllers\TaiKhoanController;
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
Route::get('xl_dang_xuat',[DangNhapController::class, 'logout']);
//Tai khoan
Route::get('ql_tk',[TaiKhoanController::class, 'viewQuanLy'])->name('ql_tk')->middleware(['session.check','quyen.check']);
Route::get('cai_dat_tk',[TaiKhoanController::class, 'viewCaiDat'])->name('cai_dat_tk')->middleware(['session.check','quyen.check']);
Route::post('xl_doi_mk',[TaiKhoanController::class, 'xlDoiMK'])->middleware(['session.check','quyen.check']);
Route::post('xl_quyen', [TaiKhoanController::class, 'xlPhanQuyen'])->name('xl_quyen')->middleware(['session.check','quyen.check']);
Route::get('export_tk',[TaiKhoanController::class, 'export'])->name('export_tk')->middleware(['session.check','quyen.check']);
//Danh muc
Route::get('ql_dm_chuc_vu',[DanhMucController::class, 'viewDMChucVu'])->name('ql_dm_chuc_vu')->middleware(['session.check','quyen.check']);
Route::get('ql_dm_chuyen_nganh',[DanhMucController::class, 'viewDMChuyenNganh'])->name('ql_dm_chuyen_nganh')->middleware(['session.check','quyen.check']);
Route::get('ql_dm_dich_vu',[DanhMucController::class, 'viewDMDichVu'])->name('ql_dm_dich_vu')->middleware(['session.check','quyen.check']);
Route::get('ql_dm_he_dao_tao',[DanhMucController::class, 'viewDMHeDaoTao'])->name('ql_dm_he_dao_tao')->middleware(['session.check','quyen.check']);
Route::get('ql_dm_khoa_hoc',[DanhMucController::class, 'viewDMKhoaHoc'])->name('ql_dm_khoa_hoc')->middleware(['session.check','quyen.check']);
Route::get('ql_dm_khoi',[DanhMucController::class, 'viewDMKhoi'])->name('ql_dm_khoi')->middleware(['session.check','quyen.check']);
Route::get('ql_dm_lop',[DanhMucController::class, 'viewDMLop'])->name('ql_dm_lop')->middleware(['session.check','quyen.check']);
Route::get('ql_dm_mon_hoc',[DanhMucController::class, 'viewDMMonHoc'])->name('ql_dm_mon_hoc')->middleware(['session.check','quyen.check']);
Route::get('ql_dm_phong_hoc',[DanhMucController::class, 'viewDMPhongHoc'])->name('ql_dm_phong_hoc')->middleware(['session.check','quyen.check']);
Route::get('ql_dm_quyen',[DanhMucController::class, 'viewDMQuyen'])->name('ql_dm_quyen')->middleware(['session.check','quyen.check']);
//----------------------------
Route::get('ql_them_chuc_vu',[DanhMucController::class, 'viewThemChucVu'])->name('ql_them_chuc_vu')->middleware(['session.check','quyen.check']);
Route::get('ql_them_chuyen_nganh',[DanhMucController::class, 'viewThemChuyenNganh'])->name('ql_them_chuyen_nganh')->middleware(['session.check','quyen.check']);
Route::get('ql_them_dich_vu',[DanhMucController::class, 'viewThemDichVu'])->name('ql_them_dich_vu')->middleware(['session.check','quyen.check']);
Route::get('ql_them_he_dao_tao',[DanhMucController::class, 'viewThemHeDaoTao'])->name('ql_them_he_dao_tao')->middleware(['session.check','quyen.check']);
Route::get('ql_them_khoa_hoc',[DanhMucController::class, 'viewThemKhoaHoc'])->name('ql_them_khoa_hoc')->middleware(['session.check','quyen.check']);
Route::get('ql_them_khoi',[DanhMucController::class, 'viewThemKhoi'])->name('ql_them_khoi')->middleware(['session.check','quyen.check']);
Route::get('ql_them_lop',[DanhMucController::class, 'viewThemLop'])->name('ql_them_lop')->middleware(['session.check','quyen.check']);
Route::get('ql_them_mon_hoc',[DanhMucController::class, 'viewThemMonHoc'])->name('ql_them_mon_hoc')->middleware(['session.check','quyen.check']);
Route::get('ql_them_phong_hoc',[DanhMucController::class, 'viewThemPhongHoc'])->name('ql_them_phong_hoc')->middleware(['session.check','quyen.check']);
Route::get('ql_them_quyen',[DanhMucController::class, 'viewThemQuyen'])->name('ql_them_quyen')->middleware(['session.check','quyen.check']);
//--------------------------------
Route::get('ql_sua_chuc_vu',[DanhMucController::class, 'viewSuaChucVu'])->name('ql_sua_chuc_vu')->middleware(['session.check','quyen.check']);
Route::get('ql_sua_chuyen_nganh',[DanhMucController::class, 'viewSuaChuyenNganh'])->name('ql_sua_chuyen_nganh')->middleware(['session.check','quyen.check']);
Route::get('ql_sua_dich_vu',[DanhMucController::class, 'viewSuaDichVu'])->name('ql_sua_dich_vu')->middleware(['session.check','quyen.check']);
Route::get('ql_sua_he_dao_tao',[DanhMucController::class, 'viewSuaHeDaoTao'])->name('ql_sua_he_dao_tao')->middleware(['session.check','quyen.check']);
Route::get('ql_sua_khoa_hoc',[DanhMucController::class, 'viewSuaKhoaHoc'])->name('ql_sua_khoa_hoc')->middleware(['session.check','quyen.check']);
Route::get('ql_sua_khoi',[DanhMucController::class, 'viewSuaKhoi'])->name('ql_sua_khoi')->middleware(['session.check','quyen.check']);
Route::get('ql_sua_lop',[DanhMucController::class, 'viewSuaLop'])->name('ql_sua_lop')->middleware(['session.check','quyen.check']);
Route::get('ql_sua_mon_hoc',[DanhMucController::class, 'viewSuaMonHoc'])->name('ql_sua_mon_hoc')->middleware(['session.check','quyen.check']);
Route::get('ql_sua_phong_hoc',[DanhMucController::class, 'viewSuaPhongHoc'])->name('ql_sua_phong_hoc')->middleware(['session.check','quyen.check']);
Route::get('ql_sua_quyen',[DanhMucController::class, 'viewSuaQuyen'])->name('ql_sua_quyen')->middleware(['session.check','quyen.check']);
//--------------------------------
Route::post('xl_dm_chuc_vu',[DanhMucController::class, 'xlDMChucVu'])->middleware(['session.check','quyen.check']);
Route::post('xl_dm_chuyen_nganh',[DanhMucController::class, 'xlDMChuyenNganh'])->middleware(['session.check','quyen.check']);
Route::post('xl_dm_dich_vu',[DanhMucController::class, 'xlDMDichVu'])->middleware(['session.check','quyen.check']);
Route::post('xl_dm_he_dao_tao',[DanhMucController::class, 'xlDMHeDaoTao'])->middleware(['session.check','quyen.check']);
Route::post('xl_dm_khoa_hoc',[DanhMucController::class, 'xlDMKhoaHoc'])->middleware(['session.check','quyen.check']);
Route::post('xl_dm_khoi',[DanhMucController::class, 'xlDMKhoi'])->middleware(['session.check','quyen.check']);
Route::post('xl_dm_lop',[DanhMucController::class, 'xlDMLop'])->middleware(['session.check','quyen.check']);
Route::post('xl_dm_mon_hoc',[DanhMucController::class, 'xlDMMonHoc'])->middleware(['session.check','quyen.check']);
Route::post('xl_dm_phong_hoc',[DanhMucController::class, 'xlDMPhongHoc'])->middleware(['session.check','quyen.check']);
Route::post('xl_dm_quyen',[DanhMucController::class, 'xlDMQuyen'])->middleware(['session.check','quyen.check']);
//Nhan vien
Route::get('ql_nv',[QLNhanVienController::class, 'viewQuanLy'])->name('ql_nv')->middleware(['session.check','quyen.check']);
Route::get('chi_tiet_nv',[QLNhanVienController::class, 'viewChiTiet'])->name('chi_tiet_nv')->middleware(['session.check','quyen.check']);
Route::get('them_nv',[QLNhanVienController::class, 'viewThem'])->name('them_nv')->middleware(['session.check','quyen.check']);
Route::get('sua_nv',[QLNhanVienController::class, 'viewSua'])->name('sua_nv')->middleware(['session.check','quyen.check']);
Route::get('cap_nhat_ttds',[QLNhanVienController::class, 'viewCapNhatTTDS'])->name('cap_nhat_ttds')->middleware(['session.check','quyen.check']);
Route::get('cap_nhat_tthn', [QLNhanVienController::class, 'viewCapNhatTTHN'])->name('cap_nhat_tthn')->middleware(['session.check','quyen.check']);
Route::get('cap_nhat_ttlh', [QLNhanVienController::class, 'viewCapNhatTTLH'])->name('cap_nhat_ttlh')->middleware(['session.check','quyen.check']);
Route::get('cap_nhat_ttbc', [QLNhanVienController::class, 'viewCapNhatTTBC'])->name('cap_nhat_ttbc')->middleware(['session.check','quyen.check']);
Route::get('cap_nhat_tthd', [QLNhanVienController::class, 'viewCapNhatTTHD'])->name('cap_nhat_tthd')->middleware(['session.check','quyen.check']);
//----------------------------
Route::post('xl_them_nv',[QLNhanVienController::class, 'xlThem'])->middleware(['session.check','quyen.check']);
Route::post('xl_sua_nv',[QLNhanVienController::class, 'xlSua'])->middleware(['session.check','quyen.check']);
Route::post('xl_ttds',[QLNhanVienController::class, 'xlTTDS'])->middleware(['session.check','quyen.check']);
Route::post('xl_tthn',[QLNhanVienController::class, 'xlTTHN'])->middleware(['session.check','quyen.check']);
Route::post('xl_ttlh',[QLNhanVienController::class, 'xlTTLH'])->middleware(['session.check','quyen.check']);
Route::post('xl_ttbc',[QLNhanVienController::class, 'xlTTBC'])->middleware(['session.check','quyen.check']);
Route::post('xl_tthd',[QLNhanVienController::class, 'xlTTHD'])->middleware(['session.check','quyen.check']);
Route::get('export_nv',[QLNhanVienController::class, 'export'])->name('export_nv')->middleware(['session.check','quyen.check']);
Route::post('import_nv',[QLNhanVienController::class, 'import'])->name('import_nv')->middleware(['session.check','quyen.check']);
//Hoc sinh
Route::get('ql_hs',[QLHocSinhController::class, 'viewQuanLy'])->name('ql_hs')->middleware(['session.check','quyen.check']);
Route::get('chi_tiet_hs',[QLHocSinhController::class, 'viewChiTiet'])->name('chi_tiet_hs')->middleware(['session.check','quyen.check']);
Route::get('them_hs',[QLHocSinhController::class, 'viewThem'])->name('them_hs')->middleware(['session.check','quyen.check']);
Route::get('sua_hs',[QLHocSinhController::class, 'viewSua'])->name('sua_hs')->middleware(['session.check','quyen.check']);
//--------------------------------
Route::post('xl_them_hs',[QLHocSinhController::class, 'xlThem'])->middleware(['session.check','quyen.check']);
Route::post('xl_sua_hs',[QLHocSinhController::class, 'xlSua'])->middleware(['session.check','quyen.check']);
Route::get('export_hs',[QLHocSinhController::class, 'export'])->name('export_hs')->middleware(['session.check','quyen.check']);
Route::post('import_hs',[QLHocSinhController::class, 'import'])->name('import_hs')->middleware(['session.check','quyen.check']);