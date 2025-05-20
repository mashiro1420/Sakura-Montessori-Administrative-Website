<?php

namespace App\Http\Controllers;

use App\Exports\LopExport;
use App\Imports\PhanLopImport;
use App\Models\DiemDanhModel;
use App\Models\HeDaoTaoModel;
use App\Models\HocSinhModel;
use App\Models\KhoaHocModel;
use App\Models\KhoiModel;
use App\Models\KyModel;
use App\Models\LopModel;
use App\Models\NhanVienModel;
use App\Models\PhanLopModel;
use App\Models\PhongHocModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PhanLopController extends Controller
{
    public function viewQuanLyPhanLop(Request $request)
    {
        $query = PhanLopModel::query()
            ->select('*', 'ql_phanlop.id as pl_id','ql_gv_cn.ho_ten as ho_ten_cn','ql_gv_nn.ho_ten as ho_ten_nn','ql_gv_vn.ho_ten as ho_ten_vn')
            ->leftJoin('ql_nhanvien as ql_gv_cn', 'ql_phanlop.id_gv_cn', '=', 'ql_gv_cn.id')
            ->leftJoin('ql_nhanvien as ql_gv_nn', 'ql_phanlop.id_gv_nuoc_ngoai', '=', 'ql_gv_nn.id')
            ->leftJoin('ql_nhanvien as ql_gv_vn', 'ql_phanlop.id_gv_viet', '=', 'ql_gv_vn.id')
            ->leftJoin('dm_phonghoc', 'ql_phanlop.id_phong_hoc', '=', 'dm_phonghoc.id')
            ->leftJoin('dm_lop', 'ql_phanlop.id_lop', '=', 'dm_lop.id')
            ->leftJoin('dm_khoi', 'ql_phanlop.id_khoi', '=', 'dm_khoi.id')
            ->leftJoin('dm_hedaotao', 'ql_phanlop.id_he_dao_tao', '=', 'dm_hedaotao.id')
            ->leftJoin('dm_khoahoc', 'ql_phanlop.id_khoa_hoc', '=', 'dm_khoahoc.id')
            ->leftJoin('tt_ky', 'ql_phanlop.id_ky', '=', 'tt_ky.id');
        if( $request->filled('gv_cn') ){
            $query->where('id_gv_cn', $request->gv_cn);
            $data['gv_cn']= $request->gv_cn;
        }
        if( $request->filled('gv_viet') ){
            $query->where('id_gv_viet', $request->gv_viet);
            $data['gv_viet']= $request->gv_viet;
        }
        if( $request->filled('gv_nuoc_ngoai') ){
            $query->where('id_gv_nuoc_ngoai', $request->gv_nuoc_ngoai);
            $data['gv_nuoc_ngoai']= $request->gv_nuoc_ngoai;
        }
        if( $request->filled('lop') ){
            $query->where('id_lop', $request->lop);
            $data['lop']= $request->lop;
        }
        if( $request->filled('khoi') ){
            $query->where('id_khoi', $request->khoi);
            $data['khoi']= $request->khoi;
        }
        if( $request->filled('phong_hoc') ){
            $query->where('id_phong_hoc', $request->phong_hoc);
            $data['phong_hoc']= $request->phong_hoc;
        }
        if( $request->filled('he_dao_tao') ){
            $query->where('id_he_dao_tao', $request->he_dao_tao);
            $data['he_dao_tao']= $request->he_dao_tao;
        }
        if( $request->filled('khoa_hoc') ){
            $query->where('id_khoa_hoc', $request->khoa_hoc);
            $data['khoa_hoc']= $request->khoa_hoc;
        }
        if( $request->filled('ky') ){
            $query->where('id_ky', $request->ky);
            $data['ky']= $request->ky;
        }
        $data['phan_lops'] = $query->orderBy('ql_phanlop.id')->get();
        // Danh sách dropdown, phân biệt theo quốc tịch
        $data['gv_viets'] = NhanVienModel::where('quoc_tich', 'Việt Nam')
            ->whereNull('ngay_nghi_viec')
            ->get();

        $data['gv_nuoc_ngoais'] = NhanVienModel::where('quoc_tich', '!=', 'Việt Nam')
            ->whereNull('ngay_nghi_viec')
            ->get();
        $data['gv_cns'] = NhanVienModel::where('quoc_tich', 'Việt Nam')
            ->whereNull('ngay_nghi_viec')
            ->get();
        $data['lops'] = LopModel::all();
        $data['phong_hocs'] = PhongHocModel::where('trang_thai', 1)->get();
        $data['khois'] = KhoiModel::all();
        $data['khoa_hocs'] = KhoaHocModel::all();
        $data['he_dao_taos'] = HeDaoTaoModel::all();
        $data['kys'] = KyModel::where('nam_hoc', '>=', date('Y'))->get();

        return view('Quan_ly_phan_lop.quan_ly_phan_lop', $data);
    }

    public function viewThemPhanLop(Request $request)
    {
        $data['lops'] = LopModel::select('*')->get();
        $data['phong_hocs'] = PhongHocModel::select('*')->where('trang_thai',1)->get();
        $data['gv_nuoc_ngoais'] = NhanVienModel::select('ql_nhanvien.*')->leftJoin('dm_chucvu','dm_chucvu.id','=','ql_nhanvien.id_chuc_vu')
            ->where('bo_phan','=', 'Giáo viên nước ngoài')->whereNull('ngay_nghi_viec')->get();
        $data['gv_cns'] = NhanVienModel::select('ql_nhanvien.*')->leftJoin('dm_chucvu','dm_chucvu.id','=','ql_nhanvien.id_chuc_vu')
            ->where('bo_phan','=', 'Giáo viên VN')
            ->whereNull('ngay_nghi_viec')
            ->get();
        $data['gv_viets'] = NhanVienModel::select('ql_nhanvien.*')->leftJoin('dm_chucvu','dm_chucvu.id','=','ql_nhanvien.id_chuc_vu')
            ->where('bo_phan','=', 'Giáo viên VN')->whereNull('ngay_nghi_viec')->get();
        $data['khois'] = KhoiModel::select('*')->get();
        $data['he_dao_taos'] = HeDaoTaoModel::select('*')->get();
        $data['khoa_hocs'] = KhoaHocModel::all();
        $data['kys'] = KyModel::select('*')->where('nam_hoc','>=',date('Y'))->get();
        return view('Quan_ly_phan_lop.them_phan_lop', $data);
    }
    public function viewSuaPhanLop(Request $request)
    {
        $data['lops'] = LopModel::select('*')->get();
        $data['phong_hocs'] = PhongHocModel::select('*')->where('trang_thai',1)->get();
        $data['gv_nuoc_ngoais'] = NhanVienModel::select('ql_nhanvien.*')->leftJoin('dm_chucvu','dm_chucvu.id','=','ql_nhanvien.id_chuc_vu')
            ->where('bo_phan','=', 'Giáo viên nước ngoài')->whereNull('ngay_nghi_viec')->get();
        $data['gv_cns'] = NhanVienModel::select('ql_nhanvien.*')->leftJoin('dm_chucvu','dm_chucvu.id','=','ql_nhanvien.id_chuc_vu')
            ->where('bo_phan','=', 'Giáo viên VN')
            ->whereNull('ngay_nghi_viec')
            ->get();
        $data['gv_viets'] = NhanVienModel::select('ql_nhanvien.*')->leftJoin('dm_chucvu','dm_chucvu.id','=','ql_nhanvien.id_chuc_vu')
            ->where('bo_phan','=', 'Giáo viên VN')->whereNull('ngay_nghi_viec')->get();
        $data['khois'] = KhoiModel::select('*')->get();
        $data['he_dao_taos'] = HeDaoTaoModel::select('*')->get();
        $data['khoa_hocs'] = KhoaHocModel::all();
        $data['kys'] = KyModel::select('*')->where('nam_hoc','>=',date('Y'))->get();
        $data['phan_lop'] = PhanLopModel::find($request->id);
        return view('Quan_ly_phan_lop.sua_phan_lop', $data);
    }
    public function viewPhanLop(Request $request)
    {
        $data = [];
        $data['phan_lop'] = PhanLopModel::query()
        ->select('*', 'ql_phanlop.id as pl_id','ql_gv_cn.ho_ten as ho_ten_cn','ql_gv_nn.ho_ten as ho_ten_nn','ql_gv_vn.ho_ten as ho_ten_vn')
        ->leftJoin('ql_nhanvien as ql_gv_cn', 'ql_phanlop.id_gv_cn', '=', 'ql_gv_cn.id')
        ->leftJoin('ql_nhanvien as ql_gv_nn', 'ql_phanlop.id_gv_nuoc_ngoai', '=', 'ql_gv_nn.id')
        ->leftJoin('ql_nhanvien as ql_gv_vn', 'ql_phanlop.id_gv_viet', '=', 'ql_gv_vn.id')
        ->leftJoin('dm_phonghoc', 'ql_phanlop.id_phong_hoc', '=', 'dm_phonghoc.id')
        ->leftJoin('dm_lop', 'ql_phanlop.id_lop', '=', 'dm_lop.id')
        ->leftJoin('dm_khoi', 'ql_phanlop.id_khoi', '=', 'dm_khoi.id')
        ->leftJoin('dm_hedaotao', 'ql_phanlop.id_he_dao_tao', '=', 'dm_hedaotao.id')
        ->leftJoin('dm_khoahoc', 'ql_phanlop.id_khoa_hoc', '=', 'dm_khoahoc.id')
        ->leftJoin('tt_ky', 'ql_phanlop.id_ky', '=', 'tt_ky.id')
        ->find($request->id);
        $data['hoc_sinh_mois'] = HocSinhModel::where('id_khoa_hoc',$data['phan_lop']->id_khoa_hoc)->whereNull('id_phan_lop')->where('trang_thai',1)->get();
        $data['hoc_sinhs'] = HocSinhModel::where('id_phan_lop',$request->id)->get();
        return view('Quan_ly_phan_lop.phan_lop', $data);
    }

    public function viewDiemDanh(Request $request)
    {
        $data['hoc_sinhs'] = HocSinhModel::query()->select ('*','ql_hocsinh.id as hoc_sinh_id')
        ->leftJoin('ql_phanlop','ql_phanlop.id','=','ql_hocsinh.id_phan_lop')
        ->leftJoin('ql_diemdanh','ql_diemdanh.id_hoc_sinh','=','ql_hocsinh.id')
        ->where('id_phan_lop',$request->id)
        ->where('loai_diem_danh',1)
        ->where('ngay',date('Y-m-d'))
        ->get();
        $data['phan_lop'] = PhanLopModel::query()
        ->select('*', 'ql_phanlop.id as pl_id','ql_gv_cn.ho_ten as ho_ten_cn','ql_gv_nn.ho_ten as ho_ten_nn','ql_gv_vn.ho_ten as ho_ten_vn')
        ->leftJoin('ql_nhanvien as ql_gv_cn', 'ql_phanlop.id_gv_cn', '=', 'ql_gv_cn.id')
        ->leftJoin('ql_nhanvien as ql_gv_nn', 'ql_phanlop.id_gv_nuoc_ngoai', '=', 'ql_gv_nn.id')
        ->leftJoin('ql_nhanvien as ql_gv_vn', 'ql_phanlop.id_gv_viet', '=', 'ql_gv_vn.id')
        ->leftJoin('dm_phonghoc', 'ql_phanlop.id_phong_hoc', '=', 'dm_phonghoc.id')
        ->leftJoin('dm_lop', 'ql_phanlop.id_lop', '=', 'dm_lop.id')
        ->leftJoin('dm_khoi', 'ql_phanlop.id_khoi', '=', 'dm_khoi.id')
        ->leftJoin('dm_hedaotao', 'ql_phanlop.id_he_dao_tao', '=', 'dm_hedaotao.id')
        ->leftJoin('dm_khoahoc', 'ql_phanlop.id_khoa_hoc', '=', 'dm_khoahoc.id')
        ->leftJoin('tt_ky', 'ql_phanlop.id_ky', '=', 'tt_ky.id')
        ->find($request->id);
        return view('Quan_ly_phan_lop.diem_danh_tren_lop', $data);
    }
    public function xlTaoLop(Request $request)
    {
        $phan_lop = new PhanLopModel();
        $phan_lop->id_gv_cn = $request->gv_cn;
        $phan_lop->id_gv_nuoc_ngoai = $request->gv_nuoc_ngoai;
        $phan_lop->id_gv_viet = $request->gv_viet;
        $phan_lop->id_phong_hoc = $request->phong_hoc;
        $phan_lop->id_lop = $request->lop;
        $phan_lop->id_khoi = $request->khoi;
        $phan_lop->id_he_dao_tao = $request->he_dao_tao;
        $phan_lop->id_khoa_hoc = $request->khoa_hoc;
        $phan_lop->id_ky = $request->ky;
        $phan_lop->save();
        return redirect()->route('ql_phan_lop')->with('bao_loi','Lưu thành công');
    }
    public function xlPhanLop(Request $request)
    {
        // dd($request);
        $phan_lop = PhanLopModel::find($request->id);
        foreach($request->hoc_sinhs as $id_hoc_sinh){
            $hoc_sinh = HocSinhModel::find($id_hoc_sinh);
            $hoc_sinh->id_phan_lop = $phan_lop->id;
            $hoc_sinh->save();
        }
        return redirect()->back()->with('bao_loi','Lưu thành công');
    }
    public function xlSuaPhanLop(Request $request)
    {
        $phan_lop = PhanLopModel::find($request->id);
        $phan_lop->id_gv_cn = $request->gv_cn;
        $phan_lop->id_gv_nuoc_ngoai = $request->gv_nuoc_ngoai;
        $phan_lop->id_gv_viet = $request->gv_viet;
        $phan_lop->id_phong_hoc = $request->phong_hoc;
        $phan_lop->id_lop = $request->lop;
        $phan_lop->id_khoi = $request->khoi;
        $phan_lop->id_he_dao_tao = $request->he_dao_tao;
        $phan_lop->id_khoa_hoc = $request->khoa_hoc;
        $phan_lop->save();
        return redirect()->route('ql_phan_lop')->with('bao_loi','Lưu thành công');
    }
    public function xlDuoi(Request $request)
    {
        $hoc_sinh = HocSinhModel::find($request->id);
        $hoc_sinh->id_phan_lop = null;
        $hoc_sinh->save();
        return redirect()->back()->with('bao_loi','Lưu thành công');
    }
    public function exportPhanLop(Request $request){
        $query = HocSinhModel::query()->select ('*','ql_hocsinh.id as hoc_sinh_id')
        ->leftJoin('ql_phanlop','ql_phanlop.id','=','ql_hocsinh.id_phan_lop')
        ->where('id_phan_lop',$request->id);
        $query = $query->get();
        $phan_lop = PhanLopModel::leftJoin('dm_phonghoc','ql_phanlop.id_phong_hoc','=','dm_phonghoc.id')
        ->leftJoin('dm_lop','ql_phanlop.id_lop','=','dm_nhanvien.id')
        ->leftJoin('dm_khoi','ql_phanlop.id_khoi','=','dm_khoi.id')
        ->leftJoin('dm_hedaotao','ql_phanlop.id_he_dao_tao','=','dm_hedaotao.id')
        ->leftJoin('dm_khoahoc','ql_phanlop.id_khoa_hoc','=','dm_khoahoc.id')
        ->leftJoin('tt_ky','ql_phanlop.id_ky','=','tt_ky.id')
        ->where('ql_phanlop.id', $request->id)->first;
        return Excel::download(new LopExport($query), ''.$phan_lop->ten_lop.$phan_lop->ten_ky.'.xlsx');
    }
    public function xlDiemDanh(Request $request)
    {
        $ds_diem_danh = explode(',', $request->ds_diem_danh);
        $ds_lop = HocSinhModel::where('id_phan_lop',$request->id)->get();
        foreach($ds_lop as $hoc_sinh){
            if(!in_array($hoc_sinh->id, $ds_diem_danh)){
                $diem_danh = DiemDanhModel::where('id_hoc_sinh', $hoc_sinh->id)->where('ngay',date('Y-m-d'))->where('loai_diem_danh',1)->first();
                if($diem_danh){
                    $diem_danh->trang_thai = 0;
                    $diem_danh->save();
                }
            }
        }
        foreach($ds_diem_danh as $diem_danh){
            $di_hoc = DiemDanhModel::where('id_hoc_sinh', $diem_danh)->where('ngay',date('Y-m-d'))->where('loai_diem_danh',1)->first();
            $di_hoc->trang_thai = 1;
            $di_hoc->save();
        }
        return redirect()->back()->with('bao_loi','Lưu thành công');
    }
    public function importPhanLop(Request $request){
        Excel::import(new PhanLopImport($request->id), $request->file('file'));
        return redirect()->back()->with('bao_loi','Lưu thành công');
    }
    //Phu huynh
    public function viewPhuHuynhDiemDanhTrenLop(Request $request)
    {
        $data['hoc_sinh'] = HocSinhModel::find(session('id_hoc_sinh'));
        if(empty($data['hoc_sinh']->id_phan_lop)) return redirect()->route('ph_td')->with('bao_loi','Học sinh chưa được phân lớp');
        $diem_danhs = DiemDanhModel::query()->select('ql_diemdanh.*','ql_hocsinh.ho_ten','dm_lop.ten_lop')
        ->leftJoin('ql_hocsinh','ql_hocsinh.id','=','ql_diemdanh.id_hoc_sinh')
        ->leftJoin('ql_phanlop','ql_phanlop.id','=','ql_hocsinh.id_phan_lop')
        ->leftJoin('dm_lop','dm_lop.id','=','ql_phanlop.id_lop')
        ->where('loai_diem_danh',1)
        ->where('id_hoc_sinh',session('id_hoc_sinh'));
        if($request->filled('search_from')){
            $diem_danhs->where('ngay','>=',$request->search_from );
            $data['search_from'] = $request->search_from;
        }
        if($request->filled('search_to')){
            $diem_danhs->where('ngay','<=',$request->search_to );
            $data['search_to'] = $request->search_to;
        }
        if($request->filled('search_status')){
            if($request->search_status==1) $data['search_status'] = 'present';
            else $data['search_status'] = 'missing';
            $diem_danhs->where('ql_diemdanh.trang_thai',$request->search_status );
        }
        $data['diem_danhs'] = $diem_danhs->orderBy('ngay','desc')->get();
        // dd( $data['diem_danhs']);
        return view('Phu_huynh_diem_danh.diem_danh_tren_lop', $data);
    }
}
