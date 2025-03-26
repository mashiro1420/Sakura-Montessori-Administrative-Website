<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChucVuModel;
use App\Models\ChuyenNganhModel;
use App\Models\DichVuModel;
use App\Models\HeDaoTaoModel;
use App\Models\KhoaHocModel;
use App\Models\KhoiModel;
use App\Models\LopModel;
use App\Models\MonHocModel;
use App\Models\PhongHocModel;
use App\Models\QuyenModel;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function viewDMChucVu(Request $request)
    {
        $data = [];
        $data['chuc_vu'] = ChucVuModel::all();
        return view('Quan_ly_danh_muc.quan_ly_dm_chuc_vu', $data);
    }
    public function viewDMChuyenNganh(Request $request)
    {
        $data = [];
        $data['chuyen_nganh'] = ChuyenNganhModel::all();
        return view('Quan_ly_danh_muc.quan_ly_dm_chuyen_nganh', $data);
    }public function viewDMDichVu(Request $request)
    {
        $data = [];
        $data['dich_vu'] = DichVuModel::all();
        return view('Quan_ly_danh_muc.quan_ly_dm_dich_vu', $data);
    }public function viewDMHeDaoTao(Request $request)
    {
        $data = [];
        $data['he_dao_tao'] = HeDaoTaoModel::all();
        return view('Quan_ly_danh_muc.quan_ly_dm_he_dao_tao', $data);
    }public function viewDMKhoaHoc(Request $request)
    {
        $data = [];
        $data['khoa_hoc'] = KhoaHocModel::all();
        return view('Quan_ly_danh_muc.quan_ly_dm_khoa_hoc', $data);
    }public function viewDMKhoi(Request $request)
    {
        $data = [];
        $data['khoi'] = KhoiModel::all();
        return view('Quan_ly_danh_muc.quan_ly_dm_khoi', $data);
    }public function viewDMLop(Request $request)
    {
        $data = [];
        $data['lop'] = LopModel::all();
        return view('Quan_ly_danh_muc.quan_ly_dm_lop', $data);
    }public function viewDMMonHoc(Request $request)
    {
        $data = [];
        $data['mon_hoc'] = MonHocModel::all();
        return view('Quan_ly_danh_muc.quan_ly_dm_mon_hoc', $data);
    }public function viewDMPhongHoc(Request $request)
    {
        $data = [];
        $data['phong_hoc'] = PhongHocModel::all();
        return view('Quan_ly_danh_muc.quan_ly_dm_phong_hoc', $data);
    }public function viewDMQuyen(Request $request)
    {
        $data = [];
        $data['quyen'] = QuyenModel::all();
        return view('Quan_ly_danh_muc.quan_ly_dm_quyen', $data);
    }
//-------------------------------------
public function viewThemChucVu(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.quan_ly_them_chuc_vu', $data);
    }
    public function viewThemChuyenNganh(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.quan_ly_them_chuyen_nganh', $data);
    }public function viewThemDichVu(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.quan_ly_them_dich_vu', $data);
    }public function viewThemHeDaoTao(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.quan_ly_them_he_dao_tao', $data);
    }public function viewThemKhoaHoc(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.quan_ly_them_khoa_hoc', $data);
    }public function viewThemKhoi(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.quan_ly_them_khoi', $data);
    }public function viewThemLop(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.quan_ly_them_lop', $data);
    }public function viewThemMonHoc(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.quan_ly_them_mon_hoc', $data);
    }public function viewThemPhongHoc(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.quan_ly_them_phong_hoc', $data);
    }public function viewThemQuyen(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.quan_ly_them_quyen', $data);
    } 
//-------------------------------------
public function viewSuaChucVu(Request $request)
    {
        $data = [];
        $data['chuc_vu'] = ChucVuModel::find($request->id);
        return view('Quan_ly_danh_muc.quan_ly_sua_chuc_vu', $data);
    }
    public function viewSuaChuyenNganh(Request $request)
    {
        $data = [];
        $data['chuyen_nganh'] = ChuyenNganhModel::find($request->id);
        return view('Quan_ly_danh_muc.quan_ly_sua_chuyen_nganh', $data);
    }public function viewSuaDichVu(Request $request)
    {
        $data = [];
        $data['dich_vu'] = DichVuModel::find($request->id); 
        return view('Quan_ly_danh_muc.quan_ly_sua_dich_vu', $data);
    }public function viewSuaHeDaoTao(Request $request)
    {
        $data = [];
        $data['he_dao_tao'] = HeDaoTaoModel::find($request->id); 
        return view('Quan_ly_danh_muc.quan_ly_sua_he_dao_tao', $data);
    }public function viewSuaKhoaHoc(Request $request)
    {
        $data = [];
        $data['khoa_hoc'] = KhoaHocModel::find($request->id);
        return view('Quan_ly_danh_muc.quan_ly_sua_khoa_hoc', $data);
    }public function viewSuaKhoi(Request $request)
    {
        $data = [];
        $data['khoi'] = KhoiModel::find($request->id); 
        return view('Quan_ly_danh_muc.quan_ly_sua_khoi', $data);
    }public function viewSuaLop(Request $request)
    {
        $data = [];
        $data['lop'] = LopModel::find($request->id); 
        return view('Quan_ly_danh_muc.quan_ly_sua_lop', $data);
    }public function viewSuaMonHoc(Request $request)
    {
        $data = [];
        $data['mon_hoc'] = MonHocModel::find($request->id); 
        return view('Quan_ly_danh_muc.quan_ly_sua_mon_hoc', $data);
    }public function viewSuaPhongHoc(Request $request)
    {
        $data = [];
        $data['phong_hoc'] = PhongHocModel::find($request->id); 
        return view('Quan_ly_danh_muc.quan_ly_sua_phong_hoc', $data);
    }public function viewSuaQuyen(Request $request)
    {
        $data = [];
        $data['quyen'] = QuyenModel::find($request->id); 
        return view('Quan_ly_danh_muc.quan_ly_sua_quyen', $data);
    } 
//-------------------------------------
    public function xlDMChucVu(Request $request){
        if(!$request->has('id')){
            $chuc_vu = new ChucVuModel();
        }
        else{
            $chuc_vu = ChucVuModel::find($request->id)->first();
        }
        $chuc_vu->ten_chuc_vu = $request->ten_chuc_vu;
        $chuc_vu->khoi_nhan_vien = $request->khoi_nhan_vien;
        $chuc_vu->bo_phan = $request->bo_phan;
        $chuc_vu->trang_thai = $request->trang_thai;
        $chuc_vu->save();
        return redirect()->route('ql_dm_chuc_vu');
    }
    public function xlDMChuyenNganh(Request $request){
        if(!$request->has('id')){
            $chuyen_nganh = new ChuyenNganhModel();
        }
        else{
            $chuyen_nganh = ChuyenNganhModel::find($request->id)->first();
        }
        $chuyen_nganh->ten_chuyen_nganh = $request->ten_chuyen_nganh;
        $chuyen_nganh->save();
        return redirect()->route('ql_dm_chuyen_nganh');
    }
    public function xlDMDichVu(Request $request){
        if(!$request->has('id')){
            $dich_vu = new DichVuModel();
        }
        else{
            $dich_vu = DichVuModel::find($request->id)->first();
        }
        $dich_vu->ten_dich_vu = $request->ten_dich_vu;
        $dich_vu->save();
        return redirect()->route('ql_dm_dich_vu');
    }
    public function xlDMHeDaoTao(Request $request){
        if(!$request->has('id')){
            $he_dao_tao = new HeDaoTaoModel();
        }
        else{
            $he_dao_tao = HeDaoTaoModel::find($request->id)->first();
        }
        $he_dao_tao->ten_he_dao_tao = $request->ten_he_dao_tao;
        $he_dao_tao->save();
        return redirect()->route('ql_dm_he_dao_tao');
    }
    public function xlDMKhoaHoc(Request $request){
        if(!$request->has('id')){
            $khoa_hoc = new KhoaHocModel();
        }
        else{
            $khoa_hoc = KhoaHocModel::find($request->id)->first();
        }
        $khoa_hoc->ten_khoa_hoc = $request->ten_khoa_hoc;
        $khoa_hoc->trang_thai = $request->trang_thai;
        $khoa_hoc->save();
        return redirect()->route('ql_dm_khoa_hoc');
    }
    public function xlDMKhoi(Request $request){
        if(!$request->has('id')){
            $khoi = new KhoiModel();
        }
        else{
            $khoi = KhoiModel::find($request->id)->first();
        }
        $khoi->ten_khoi = $request->ten_khoi;
        $khoi->save();
        return redirect()->route('ql_dm_khoi');
    }
    public function xlDMLop(Request $request){
        if(!$request->has('id')){
            $lop = new LopModel();
        }
        else{
            $lop = LopModel::find($request->id)->first();
        }
        $lop->ten_lop = $request->ten_lop;
        $lop->save();
        return redirect()->route('ql_dm_lop');
    }
    public function xlDMMonHoc(Request $request){
        if(!$request->has('id')){
            $mon_hoc = new MonHocModel();
        }
        else{
            $mon_hoc = MonHocModel::find($request->id)->first();
        }
        $mon_hoc->ten_mon_hoc = $request->ten_mon_hoc;
        $mon_hoc->save();
        return redirect()->route('ql_dm_mon_hoc');
    }
    public function xlDMPhongHoc(Request $request){
        if(!$request->has('id')){
            $phong_hoc = new PhongHocModel();
        }
        else{
            $phong_hoc = PhongHocModel::find($request->id)->first();
        }
        $phong_hoc->ten_phong_hoc = $request->ten_phong_hoc;
        $phong_hoc->so_tang = $request->so_tang;
        $phong_hoc->suc_chua = $request->suc_chua;
        $phong_hoc->trang_thai = $request->trang_thai;
        $phong_hoc->save();
        return redirect()->route('ql_dm_phong_hoc');
    }
    public function xlDMQuyen(Request $request){
        if(!$request->has('id')){
            $quyen = new QuyenModel();
        }
        else{
            $quyen = QuyenModel::find($request->id)->first();
        }
        $quyen->ten_quyen = $request->ten_quyen;
        $quyen->save();
        return redirect()->route('ql_dm_quyen');
    }
}
