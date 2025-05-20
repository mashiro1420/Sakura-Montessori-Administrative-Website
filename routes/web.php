<?php

use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\KeHoachGiangDayController;
use App\Http\Controllers\PhanLopController;
use App\Http\Controllers\QLHocSinhController;
use App\Http\Controllers\QLNhanVienController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\GiangDayController;
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
Route::middleware(['session.check', 'quyen.check:tai_khoan'])->group(function () {
    Route::get('ql_tk',[TaiKhoanController::class, 'viewQuanLy'])->name('ql_tk');
    Route::get('cai_dat_tk',[TaiKhoanController::class, 'viewCaiDat'])->name('cai_dat_tk');
    Route::post('xl_doi_mk',[TaiKhoanController::class, 'xlDoiMK']);
    Route::post('xl_quyen', [TaiKhoanController::class, 'xlPhanQuyen'])->name('xl_quyen');
    Route::get('export_tk',[TaiKhoanController::class, 'export'])->name('export_tk');
    Route::get('bao_cao_tk',[TaiKhoanController::class, 'viewBaoCao'])->name('bao_cao_tk');
});
Route::middleware(['session.check', 'quyen.check:danh_muc'])->group(function () {
    Route::get('ql_dm_chuc_vu',[DanhMucController::class, 'viewDMChucVu'])->name('ql_dm_chuc_vu');
    Route::get('ql_dm_chuyen_nganh',[DanhMucController::class, 'viewDMChuyenNganh'])->name('ql_dm_chuyen_nganh');
    Route::get('ql_dm_dich_vu',[DanhMucController::class, 'viewDMDichVu'])->name('ql_dm_dich_vu');
    Route::get('ql_dm_he_dao_tao',[DanhMucController::class, 'viewDMHeDaoTao'])->name('ql_dm_he_dao_tao');
    Route::get('ql_dm_tuyen_xe',[DanhMucController::class, 'viewDMTuyenXe'])->name('ql_dm_tuyen_xe');
    Route::get('ql_dm_khoa_hoc',[DanhMucController::class, 'viewDMKhoaHoc'])->name('ql_dm_khoa_hoc');
    Route::get('ql_dm_khoi',[DanhMucController::class, 'viewDMKhoi'])->name('ql_dm_khoi');
    Route::get('ql_dm_lop',[DanhMucController::class, 'viewDMLop'])->name('ql_dm_lop');
    Route::get('ql_dm_mon_hoc',[DanhMucController::class, 'viewDMMonHoc'])->name('ql_dm_mon_hoc');
    Route::get('ql_dm_phong_hoc',[DanhMucController::class, 'viewDMPhongHoc'])->name('ql_dm_phong_hoc');
    Route::get('ql_dm_quyen',[DanhMucController::class, 'viewDMQuyen'])->name('ql_dm_quyen');
    //----------------------------
    Route::get('ql_them_chuc_vu',[DanhMucController::class, 'viewThemChucVu'])->name('ql_them_chuc_vu');
    Route::get('ql_them_chuyen_nganh',[DanhMucController::class, 'viewThemChuyenNganh'])->name('ql_them_chuyen_nganh');
    Route::get('ql_them_dich_vu',[DanhMucController::class, 'viewThemDichVu'])->name('ql_them_dich_vu');
    Route::get('ql_them_he_dao_tao',[DanhMucController::class, 'viewThemHeDaoTao'])->name('ql_them_he_dao_tao');
    Route::get('ql_them_tuyen_xe',[DanhMucController::class, 'viewThemTuyenXe'])->name('ql_them_tuyen_xe');
    Route::get('ql_them_khoa_hoc',[DanhMucController::class, 'viewThemKhoaHoc'])->name('ql_them_khoa_hoc');
    Route::get('ql_them_khoi',[DanhMucController::class, 'viewThemKhoi'])->name('ql_them_khoi');
    Route::get('ql_them_lop',[DanhMucController::class, 'viewThemLop'])->name('ql_them_lop');
    Route::get('ql_them_mon_hoc',[DanhMucController::class, 'viewThemMonHoc'])->name('ql_them_mon_hoc');
    Route::get('ql_them_phong_hoc',[DanhMucController::class, 'viewThemPhongHoc'])->name('ql_them_phong_hoc');
    Route::get('ql_them_quyen',[DanhMucController::class, 'viewThemQuyen'])->name('ql_them_quyen');
    //--------------------------------
    Route::get('ql_sua_chuc_vu',[DanhMucController::class, 'viewSuaChucVu'])->name('ql_sua_chuc_vu');
    Route::get('ql_sua_chuyen_nganh',[DanhMucController::class, 'viewSuaChuyenNganh'])->name('ql_sua_chuyen_nganh');
    Route::get('ql_sua_dich_vu',[DanhMucController::class, 'viewSuaDichVu'])->name('ql_sua_dich_vu');
    Route::get('ql_sua_he_dao_tao',[DanhMucController::class, 'viewSuaHeDaoTao'])->name('ql_sua_he_dao_tao');
    Route::get('ql_sua_tuyen_xe',[DanhMucController::class, 'viewSuaTuyenXe'])->name('ql_sua_tuyen_xe');
    Route::get('ql_sua_khoa_hoc',[DanhMucController::class, 'viewSuaKhoaHoc'])->name('ql_sua_khoa_hoc');
    Route::get('ql_sua_khoi',[DanhMucController::class, 'viewSuaKhoi'])->name('ql_sua_khoi');
    Route::get('ql_sua_lop',[DanhMucController::class, 'viewSuaLop'])->name('ql_sua_lop');
    Route::get('ql_sua_mon_hoc',[DanhMucController::class, 'viewSuaMonHoc'])->name('ql_sua_mon_hoc');
    Route::get('ql_sua_phong_hoc',[DanhMucController::class, 'viewSuaPhongHoc'])->name('ql_sua_phong_hoc');
    Route::get('ql_sua_quyen',[DanhMucController::class, 'viewSuaQuyen'])->name('ql_sua_quyen');
    //--------------------------------
    Route::post('xl_dm_chuc_vu',[DanhMucController::class, 'xlDMChucVu']);
    Route::post('xl_dm_chuyen_nganh',[DanhMucController::class, 'xlDMChuyenNganh']);
    Route::post('xl_dm_dich_vu',[DanhMucController::class, 'xlDMDichVu']);
    Route::post('xl_dm_he_dao_tao',[DanhMucController::class, 'xlDMHeDaoTao']);
    Route::post('xl_dm_tuyen_xe',[DanhMucController::class, 'xlDMTuyenXe']);
    Route::post('xl_dm_khoa_hoc',[DanhMucController::class, 'xlDMKhoaHoc']);
    Route::post('xl_dm_khoi',[DanhMucController::class, 'xlDMKhoi']);
    Route::post('xl_dm_lop',[DanhMucController::class, 'xlDMLop']);
    Route::post('xl_dm_mon_hoc',[DanhMucController::class, 'xlDMMonHoc']);
    Route::post('xl_dm_phong_hoc',[DanhMucController::class, 'xlDMPhongHoc']);
    Route::post('xl_dm_quyen',[DanhMucController::class, 'xlDMQuyen']);
});
Route::middleware(['session.check', 'quyen.check:nhan_vien'])->group(function () {
    Route::get('ql_nv',[QLNhanVienController::class, 'viewQuanLy'])->name('ql_nv');
    Route::get('chi_tiet_nv',[QLNhanVienController::class, 'viewChiTiet'])->name('chi_tiet_nv');
    Route::get('them_nv',[QLNhanVienController::class, 'viewThem'])->name('them_nv');
    Route::get('sua_nv',[QLNhanVienController::class, 'viewSua'])->name('sua_nv');
    Route::get('cap_nhat_ttds',[QLNhanVienController::class, 'viewCapNhatTTDS'])->name('cap_nhat_ttds');
    Route::get('cap_nhat_tthn', [QLNhanVienController::class, 'viewCapNhatTTHN'])->name('cap_nhat_tthn');
    Route::get('cap_nhat_ttlh', [QLNhanVienController::class, 'viewCapNhatTTLH'])->name('cap_nhat_ttlh');
    Route::get('cap_nhat_ttbc', [QLNhanVienController::class, 'viewCapNhatTTBC'])->name('cap_nhat_ttbc');
    Route::get('cap_nhat_tthd', [QLNhanVienController::class, 'viewCapNhatTTHD'])->name('cap_nhat_tthd');
    //----------------------------
    Route::post('xl_them_nv',[QLNhanVienController::class, 'xlThem']);
    Route::post('xl_sua_nv',[QLNhanVienController::class, 'xlSua']);
    Route::post('xl_ttds',[QLNhanVienController::class, 'xlTTDS']);
    Route::post('xl_tthn',[QLNhanVienController::class, 'xlTTHN']);
    Route::post('xl_ttlh',[QLNhanVienController::class, 'xlTTLH']);
    Route::post('xl_ttbc',[QLNhanVienController::class, 'xlTTBC']);
    Route::post('xl_tthd',[QLNhanVienController::class, 'xlTTHD']);
    Route::get('export_nv',[QLNhanVienController::class, 'export'])->name('export_nv');
    Route::post('import_nv',[QLNhanVienController::class, 'import'])->name('import_nv');
});
Route::middleware(['session.check', 'quyen.check:hoc_sinh'])->group(function () {
    Route::get('ql_hs',[QLHocSinhController::class, 'viewQuanLy'])->name('ql_hs');
    Route::get('chi_tiet_hs',[QLHocSinhController::class, 'viewChiTiet'])->name('chi_tiet_hs');
    Route::get('them_hs',[QLHocSinhController::class, 'viewThem'])->name('them_hs');
    Route::get('sua_hs',[QLHocSinhController::class, 'viewSua'])->name('sua_hs');
    Route::get('hien_thi_thanh_toan',[QLHocSinhController::class, 'viewHienThiThanhToan'])->name('hien_thi_thanh_toan');
    Route::get('hien_thi_ho_so',[QLHocSinhController::class, 'viewHienThiHoSo'])->name('hien_thi_ho_so');
    //--------------------------------
    Route::post('xl_them_hs',[QLHocSinhController::class, 'xlThem']);
    Route::post('xl_sua_hs',[QLHocSinhController::class, 'xlSua']);
    Route::post('xl_thoi_hoc',[QLHocSinhController::class, 'xlThoiHoc']);
    Route::post('xl_nhap_hoc_lai',[QLHocSinhController::class, 'xlNhapHocLai']);
    Route::get('xl_quay_lai',[QLHocSinhController::class, 'xlQuayLai'])->name('xl_quay_lai');
    Route::post('xl_bao_luu',[QLHocSinhController::class, 'xlBaoLuu']);
    Route::post('xl_thanh_toan',[QLHocSinhController::class, 'xlThanhToan']);
    Route::get('export_hs',[QLHocSinhController::class, 'export'])->name('export_hs');
    Route::post('import_hs',[QLHocSinhController::class, 'import'])->name('import_hs');
});
Route::middleware(['session.check', 'quyen.check:phan_lop'])->group(function () {
    Route::get('diem_danh',[PhanLopController::class, 'viewDiemDanh'])->name('diem_danh');
    Route::get('ql_phan_lop',[PhanLopController::class, 'viewQuanLyPhanLop'])->name('ql_phan_lop');
    Route::get('them_phan_lop',[PhanLopController::class, 'viewThemPhanLop'])->name('them_phan_lop');
    Route::get('phan_lop',[PhanLopController::class, 'viewPhanLop'])->name('phan_lop');
    Route::get('sua_phan_lop',[PhanLopController::class, 'viewSuaPhanLop'])->name('sua_phan_lop');
    //--------------------------------
    Route::post('xl_tao_lop',[PhanLopController::class, 'xlTaoLop']);
    Route::post('xl_phan_lop',[PhanLopController::class, 'xlPhanLop']);
    Route::post('xl_sua_phan_lop',[PhanLopController::class, 'xlSuaPhanLop']);
    Route::post('xl_diem_danh',[PhanLopController::class, 'xlDiemDanh']);
    Route::get('xl_duoi',[PhanLopController::class, 'xlDuoi'])->name('xl_duoi');
    Route::get('export_lop',[PhanLopController::class, 'exportPhanLop'])->name('export_lop');
    Route::post('import_lop',[PhanLopController::class, 'importPhanLop'])->name('import_lop');
});
Route::middleware(['session.check', 'quyen.check:monitor_bus'])->group(function () {
    //--------------------------------\
    Route::get('ql_lt', [DichVuController::class, 'viewQuanLyLoTrinh'])->name('ql_lt');
    Route::get('them_lt', [DichVuController::class, 'viewThemLoTrinh'])->name('them_lt');
    Route::get('sua_lt', [DichVuController::class, 'viewSuaLoTrinh'])->name('sua_lt');
    Route::post('xl_them_lt',[DichVuController::class, 'xlThemLoTrinh']);
    Route::get('diem_danh_bus', [DichVuController::class, 'viewDiemDanhBus'])->name('diem_danh_bus');
    Route::post('xl_diem_danh_bus',[DichVuController::class, 'xlDiemDanh']);
    Route::post('xl_upload_diem_danh',[DichVuController::class, 'xlUploadDiemDanhBus']);
});
Route::middleware(['session.check', 'quyen.check:bang_gia'])->group(function () {
    //Bang gia
    Route::get('ql_bg', [DichVuController::class, 'viewQuanLyBangGia'])->name('ql_bg');
    Route::get('them_bg', [DichVuController::class, 'viewThemBangGia'])->name('them_bg');
    Route::get('sua_bg', [DichVuController::class, 'viewSuaBangGia'])->name('sua_bg');
    Route::post('xl_sua_bg', [DichVuController::class, 'xlSuaGia']);
    Route::post('xl_them_bg', [DichVuController::class, 'xlThemGia']);
});
Route::middleware(['session.check', 'quyen.check:dang_ky_dv'])->group(function () {
    Route::get('ql_dk_bus_hs', [DichVuController::class, 'viewQuanLyDangKyBusHS'])->name('ql_dk_bus_hs');
    Route::get('dk_bus_hs', [DichVuController::class, 'viewDangKyBusHS'])->name('dk_bus_hs');
    Route::get('ql_dk_an_hs', [DichVuController::class, 'viewQuanLyDangKyAnHS'])->name('ql_dk_an_hs');
    //----------------------------------------//
    Route::post('xl_dk_bus',[DichVuController::class, 'xlDKBusHS']);
    Route::post('xl_dk_an',[DichVuController::class, 'xlDKAnHS']);
    Route::get('xl_huy_an', [DichVuController::class, 'xlHuyDKAnHS'])->name('xl_huy_an');
});
Route::middleware(['session.check', 'quyen.check:thuc_don'])->group(function () {
    //Thong ke
    Route::get('ql_td', [DichVuController::class, 'viewQuanLyThucDon'])->name('ql_td');
    Route::post('import_menu',[DichVuController::class, 'importMenu'])->name('import_menu');
});
Route::middleware(['session.check', 'quyen.check:giang_day'])->group(function () {
    //Thoi khoa bieu
    Route::get('ql_tkb', [GiangDayController::class, 'viewQuanLyTKB'])->name('ql_tkb');
    Route::get('xem_tkb', [GiangDayController::class, 'viewXemTKB'])->name('xem_tkb');
    Route::get('chinh_tkb', [GiangDayController::class, 'viewChinhTKB'])->name('them_tkb');
    //---------------//
    Route::post('xl_tao_tkb',[GiangDayController::class, 'xlTKB']);
    //Giang day
    Route::get('ql_tlgd', [KeHoachGiangDayController::class, 'viewQuanLyTaiLieuGiangDay'])->name('ql_tlgd');
    Route::get('them_tlgd', [KeHoachGiangDayController::class, 'viewThemTaiLieuGiangDay'])->name('them_tlgd');
    Route::get('sua_tlgd', [KeHoachGiangDayController::class, 'viewSuaTaiLieuGiangDay'])->name('sua_tlgd');
    Route::post('xl_them_tlgd',[KeHoachGiangDayController::class, 'xlThemTaiLieuGiangDay']);
    Route::post('xl_sua_tlgd',[KeHoachGiangDayController::class, 'xlSuaTaiLieuGiangDay']);
    Route::get('xl_xoa_tlgd',[KeHoachGiangDayController::class, 'xlXoaTaiLieuGiangDay'])->name('xl_xoa_tlgd');
});
Route::middleware(['session.check', 'quyen.check:phu_huynh'])->group(function () {
    Route::get('ph_tkb', [GiangDayController::class, 'viewPhuHuynhTKB'])->name('ph_tkb');
    Route::get('ph_bg', [DichVuController::class, 'viewPhuHuynhBangGia'])->name('ph_bg');
    Route::get('ph_tx', [DichVuController::class, 'viewPhuHuynhTuyenXe'])->name('ph_tx');
    Route::get('ph_td', [DichVuController::class, 'viewPhuHuynhThucDon'])->name('ph_td');
    Route::get('ph_diem_danh_xe_bus', [DichVuController::class, 'viewPhuHuynhDiemDanhXeBus'])->name('ph_diem_danh_xe_bus');
    Route::get('ph_diem_danh_tren_lop', [PhanLopController::class, 'viewPhuHuynhDiemDanhTrenLop'])->name('ph_diem_danh_tren_lop');
    Route::get('ph_thanh_toan', [QLHocSinhController::class, 'viewPhuHuynhThanhToan'])->name('ph_thanh_toan');
    Route::get('ph_tai_khoan', [QLHocSinhController::class, 'viewPhuHuynhTaiKhoan'])->name('ph_tai_khoan');
    Route::get('ph_sua_tai_khoan', [QLHocSinhController::class, 'viewPhuHuynhSuaTaiKhoan'])->name('ph_sua_tai_khoan');
});
