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
        $query = ChucVuModel::query()->select ('*');
        if ($request->has('tk_ten_chuc_vu') && !empty($request->tk_ten_chuc_vu)){
            $query->where('ten_chuc_vu','like','%'.$request->tk_ten_chuc_vu.'%');
            $data['tk_ten_chuc_vu'] = $request->tk_ten_chuc_vu;
        }
        if ($request->has('tk_khoi_nhan_vien') && !empty($request->tk_khoi_nhan_vien)){
            $query->where('khoi_nhan_vien','like','%'.$request->tk_khoi_nhan_vien.'%');
            $data['tk_khoi_nhan_vien'] = $request->tk_khoi_nhan_vien;
        }
        if ($request->has('tk_trang_thai')&& $request->tk_trang_thai!=""){
            $query->where('trang_thai',$request->tk_trang_thai);
            $data['tk_trang_thai'] = $request->tk_trang_thai==0?"empty":"booked";
        }
        $data['chuc_vus'] = $query->orderBy('id')->get();
        return view('Quan_ly_danh_muc.Danh_muc_chuc_vu.quan_ly_dm_chuc_vu', $data);
    }
    public function viewDMChuyenNganh(Request $request)
    {
        $data = [];
        $query = ChuyenNganhModel::query()->select ('*');
        if ($request->has('tk_ten_chuyen_nganh') && !empty($request->tk_ten_chuyen_nganh)){
            $query->where('ten_chuyen_nganh','like','%'.$request->tk_ten_chuyen_nganh.'%');
            $data['tk_ten_chuyen_nganh'] = $request->tk_ten_chuyen_nganh;
        }
        $data['chuyen_nganhs'] = $query->orderBy('id')->get();
        return view('Quan_ly_danh_muc.Danh_muc_chuyen_nganh.quan_ly_dm_chuyen_nganh', $data);
    }public function viewDMDichVu(Request $request)
    {
        $data = [];
        $query = DichVuModel::query()->select ('*');
        if ($request->has('tk_ten_dich_vu') && !empty($request->tk_ten_dich_vu)){
            $query->where('ten_dich_vu','like','%'.$request->tk_ten_dich_vu.'%');
            $data['tk_ten_dich_vu'] = $request->tk_ten_dich_vu;
        }
        $data['dich_vus'] = $query->orderBy('id')->get();
        return view('Quan_ly_danh_muc.Danh_muc_dich_vu.quan_ly_dm_dich_vu', $data);
    }public function viewDMHeDaoTao(Request $request)
    {
        $data = [];
        $query = HeDaoTaoModel::query()->select ('*');
        if ($request->has('tk_ten_he_dao_tao') && !empty($request->tk_ten_he_dao_tao)){
            $query->where('ten_he_dao_tao','like','%'.$request->tk_ten_he_dao_tao.'%');
            $data['tk_ten_he_dao_tao'] = $request->tk_ten_he_dao_tao;
        }
        $data['he_dao_taos'] = $query->orderBy('id')->get();
        return view('Quan_ly_danh_muc.Danh_muc_he_dao_tao.quan_ly_dm_he_dao_tao', $data);
    }public function viewDMKhoaHoc(Request $request)
    {
        $data = [];
        $query = KhoaHocModel::query()->select ('*');
        if ($request->has('tk_ten_khoa_hoc') && !empty($request->tk_ten_khoa_hoc)){
            $query->where('ten_khoa_hoc','like','%'.$request->tk_ten_khoa_hoc.'%');
            $data['tk_ten_khoa_hoc'] = $request->tk_ten_khoa_hoc;
        }
        if ($request->has('tk_trang_thai')&& $request->tk_trang_thai!=""){
            $query->where('trang_thai',$request->tk_trang_thai);
            $data['tk_trang_thai'] = $request->tk_trang_thai==0?"empty":"booked";
        }
        $data['khoa_hocs'] = $query->orderBy('id')->get();
        return view('Quan_ly_danh_muc.Danh_muc_khoa_hoc.quan_ly_dm_khoa_hoc', $data);
    }public function viewDMKhoi(Request $request)
    {
        $data = [];
        $query = KhoiModel::query()->select ('*');
        if ($request->has('tk_ten_khoi') && !empty($request->tk_ten_khoi)){
            $query->where('ten_khoi','like','%'.$request->tk_ten_khoi.'%');
            $data['tk_ten_khoi'] = $request->tk_ten_khoi;
        }
        $data['khois'] = $query->orderBy('id')->get();
        return view('Quan_ly_danh_muc.Danh_muc_khoi.quan_ly_dm_khoi', $data);
    }public function viewDMLop(Request $request)
    {
        $data = [];
        $query = LopModel::query()->select ('*');
        if ($request->has('tk_ten_lop') && !empty($request->tk_ten_lop)){
            $query->where('ten_lop','like','%'.$request->tk_ten_lop.'%');
            $data['tk_ten_lop'] = $request->tk_ten_lop;
        }
        $data['lops'] = $query->orderBy('id')->get();
        return view('Quan_ly_danh_muc.Danh_muc_lop.quan_ly_dm_lop', $data);
    }public function viewDMMonHoc(Request $request)
    {
        $data = [];
        $query = MonHocModel::query()->select ('*');
        if ($request->has('tk_ten_mon_hoc') && !empty($request->tk_ten_mon_hoc)){
            $query->where('ten_mon_hoc','like','%'.$request->tk_ten_mon_hoc.'%');
            $data['tk_ten_mon_hoc'] = $request->tk_ten_mon_hoc;
        }
        $data['mon_hocs'] = $query->orderBy('id')->get();
        return view('Quan_ly_danh_muc.Danh_muc_mon_hoc.quan_ly_dm_mon_hoc', $data);
    }public function viewDMPhongHoc(Request $request)
    {
        $data = [];
        $query = PhongHocModel::query()->select ('*');
        if ($request->has('tk_ten_phong_hoc') && !empty($request->tk_ten_phong_hoc)){
            $query->where('ten_phong_hoc','like','%'.$request->tk_ten_phong_hoc.'%');
            $data['tk_ten_phong_hoc'] = $request->tk_ten_phong_hoc;
        }
        if ($request->has('tk_so_tang') && !empty($request->tk_so_tang)){
            $query->where('so_tang',$request->tk_so_tang);
            $data['tk_so_tang'] = $request->tk_so_tang;
        }
        if ($request->has('tk_suc_chua') && !empty($request->tk_suc_chua)){
            $query->where('suc_chua',$request->tk_suc_chua);
            $data['tk_suc_chua'] = $request->tk_suc_chua;
        }
        if ($request->has('tk_trang_thai')&& $request->tk_trang_thai!=""){
            $query->where('trang_thai',$request->tk_trang_thai);
            $data['tk_trang_thai'] = $request->tk_trang_thai==0?"empty":"booked";
        }
        $data['phong_hocs'] = $query->orderBy('id')->get();
        return view('Quan_ly_danh_muc.Danh_muc_phong_hoc.quan_ly_dm_phong_hoc', $data);
    }public function viewDMQuyen(Request $request)
    {
        $data = [];
        $query = QuyenModel::query()->select ('*');
        if ($request->has('tk_ten_quyen') && !empty($request->tk_ten_quyen)){
            $query->where('ten_quyen','like','%'.$request->tk_ten_quyen.'%');
            $data['tk_ten_quyen'] = $request->tk_ten_quyen;
        }
        $data['quyens'] = $query->orderBy('id')->get();
        return view('Quan_ly_danh_muc.Danh_muc_quyen.quan_ly_dm_quyen', $data);
    }
//-------------------------------------
public function viewThemChucVu(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.Danh_muc_chuc_vu.quan_ly_them_chuc_vu', $data);
    }
    public function viewThemChuyenNganh(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.Danh_muc_chuyen_nganh.quan_ly_them_chuyen_nganh', $data);
    }public function viewThemDichVu(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.Danh_muc_dich_vu.quan_ly_them_dich_vu', $data);
    }public function viewThemHeDaoTao(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.Danh_muc_he_dao_tao.quan_ly_them_he_dao_tao', $data);
    }public function viewThemKhoaHoc(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.Danh_muc_khoa_hoc.quan_ly_them_khoa_hoc', $data);
    }public function viewThemKhoi(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.Danh_muc_khoi.quan_ly_them_khoi', $data);
    }public function viewThemLop(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.Danh_muc_lop.quan_ly_them_lop', $data);
    }public function viewThemMonHoc(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.Danh_muc_mon_hoc.quan_ly_them_mon_hoc', $data);
    }public function viewThemPhongHoc(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.Danh_muc_phong_hoc.quan_ly_them_phong_hoc', $data);
    }public function viewThemQuyen(Request $request)
    {
        $data = [];
        return view('Quan_ly_danh_muc.Danh_muc_quyen.quan_ly_them_quyen', $data);
    } 
//-------------------------------------
public function viewSuaChucVu(Request $request)
    {
        $data = [];
        $data['chuc_vu'] = ChucVuModel::find($request->id);
        return view('Quan_ly_danh_muc.Danh_muc_chuc_vu.quan_ly_sua_chuc_vu', $data);
    }
    public function viewSuaChuyenNganh(Request $request)
    {
        $data = [];
        $data['chuyen_nganh'] = ChuyenNganhModel::find($request->id);
        return view('Quan_ly_danh_muc.Danh_muc_chuyen_nganh.quan_ly_sua_chuyen_nganh', $data);
    }public function viewSuaDichVu(Request $request)
    {
        $data = [];
        $data['dich_vu'] = DichVuModel::find($request->id); 
        return view('Quan_ly_danh_muc.Danh_muc_dich_vu.quan_ly_sua_dich_vu', $data);
    }public function viewSuaHeDaoTao(Request $request)
    {
        $data = [];
        $data['he_dao_tao'] = HeDaoTaoModel::find($request->id); 
        return view('Quan_ly_danh_muc.Danh_muc_he_dao_tao.quan_ly_sua_he_dao_tao', $data);
    }public function viewSuaKhoaHoc(Request $request)
    {
        $data = [];
        $data['khoa_hoc'] = KhoaHocModel::find($request->id);
        return view('Quan_ly_danh_muc.Danh_muc_khoa_hoc.quan_ly_sua_khoa_hoc', $data);
    }public function viewSuaKhoi(Request $request)
    {
        $data = [];
        $data['khoi'] = KhoiModel::find($request->id); 
        return view('Quan_ly_danh_muc.Danh_muc_khoi.quan_ly_sua_khoi', $data);
    }public function viewSuaLop(Request $request)
    {
        $data = [];
        $data['lop'] = LopModel::find($request->id); 
        return view('Quan_ly_danh_muc.Danh_muc_lop.quan_ly_sua_lop', $data);
    }public function viewSuaMonHoc(Request $request)
    {
        $data = [];
        $data['mon_hoc'] = MonHocModel::find($request->id); 
        return view('Quan_ly_danh_muc.Danh_muc_mon_hoc.quan_ly_sua_mon_hoc', $data);
    }public function viewSuaPhongHoc(Request $request)
    {
        $data = [];
        $data['phong_hoc'] = PhongHocModel::find($request->id); 
        return view('Quan_ly_danh_muc.Danh_muc_phong_hoc.quan_ly_sua_phong_hoc', $data);
    }public function viewSuaQuyen(Request $request)
    {
        $data = [];
        $data['quyen'] = QuyenModel::find($request->id); 
        return view('Quan_ly_danh_muc.Danh_muc_quyen.quan_ly_sua_quyen', $data);
    } 
//-------------------------------------
    public function xlDMChucVu(Request $request){
            $chuc_vu = ChucVuModel::firstOrNew(['id' => $request->id?$request->id : null]);
            $chuc_vu->ten_chuc_vu = $request->ten_chuc_vu;
            $chuc_vu->khoi_nhan_vien = $request->khoi_nhan_vien;
            $chuc_vu->bo_phan = $request->bo_phan;
            if(isset($request->trang_thai)){
               $chuc_vu->trang_thai = $request->trang_thai; 
            }
            $chuc_vu->save();
        return redirect()->route('ql_dm_chuc_vu');
    }
    public function xlDMChuyenNganh(Request $request){
        $chuyen_nganh = ChuyenNganhModel::firstOrNew(['id' => $request->id?$request->id : null]);
        $chuyen_nganh->ten_chuyen_nganh = $request->ten_chuyen_nganh;
        $chuyen_nganh->save();
        return redirect()->route('ql_dm_chuyen_nganh');
    }
    public function xlDMDichVu(Request $request){
        $dich_vu = DichVuModel::firstOrNew(['id' => $request->id?$request->id : null]);
        $dich_vu->ten_dich_vu = $request->ten_dich_vu;
        $dich_vu->save();
        return redirect()->route('ql_dm_dich_vu');
    }
    public function xlDMHeDaoTao(Request $request){
        $he_dao_tao = HeDaoTaoModel::firstOrNew(['id' => $request->id?$request->id : null]);
        $he_dao_tao->ten_he_dao_tao = $request->ten_he_dao_tao;
        $he_dao_tao->save();
        return redirect()->route('ql_dm_he_dao_tao');
    }
    public function xlDMKhoaHoc(Request $request){
        $khoa_hoc = KhoaHocModel::firstOrNew(['id' => $request->id?$request->id : null]);
        $khoa_hoc->ten_khoa_hoc = $request->ten_khoa_hoc;
        if(isset($request->trang_thai)){
            $khoa_hoc->trang_thai = $request->trang_thai; 
        }
        $khoa_hoc->save();
        return redirect()->route('ql_dm_khoa_hoc');
    }
    public function xlDMKhoi(Request $request){
        $khoi = KhoiModel::firstOrNew(['id' => $request->id?$request->id : null]);
        $khoi->ten_khoi = $request->ten_khoi;
        $khoi->save();
        return redirect()->route('ql_dm_khoi');
    }
    public function xlDMLop(Request $request){
        $lop = LopModel::firstOrNew(['id' => $request->id?$request->id : null]);
        $lop->ten_lop = $request->ten_lop;
        $lop->save();
        return redirect()->route('ql_dm_lop');
    }
    public function xlDMMonHoc(Request $request){
        $mon_hoc = MonHocModel::firstOrNew(['id' => $request->id?$request->id : null]);
        $mon_hoc->ten_mon_hoc = $request->ten_mon_hoc;
        $mon_hoc->save();
        return redirect()->route('ql_dm_mon_hoc');
    }
    public function xlDMPhongHoc(Request $request){
        $phong_hoc = PhongHocModel::firstOrNew(['id' => $request->id?$request->id : null]);
        $phong_hoc->ten_phong_hoc = $request->ten_phong_hoc;
        $phong_hoc->so_tang = $request->so_tang;
        $phong_hoc->suc_chua = $request->suc_chua;
        if(isset($request->trang_thai)){
            $phong_hoc->trang_thai = $request->trang_thai; 
        }
        $phong_hoc->save();
        return redirect()->route('ql_dm_phong_hoc');
    }
    public function xlDMQuyen(Request $request){
        $quyen = QuyenModel::firstOrNew(['id' => $request->id?$request->id : null]);
        $quyen->ten_quyen = $request->ten_quyen;
        $quyen->save();
        return redirect()->route('ql_dm_quyen');
    }
}
