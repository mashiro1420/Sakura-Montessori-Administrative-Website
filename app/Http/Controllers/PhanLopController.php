<?php

namespace App\Http\Controllers;

use App\Exports\LopExport;
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
            ->select('ql_phanlop.*')
            ->leftJoin('ql_nhanvien', 'ql_phanlop.id_gv_cn', '=', 'ql_nhanvien.id')
            ->leftJoin('ql_nhanvien as ql_nv_nn', 'ql_phanlop.id_gv_nuoc_ngoai', '=', 'ql_nv_nn.id')
            ->leftJoin('ql_nhanvien as ql_nv_vn', 'ql_phanlop.id_gv_viet', '=', 'ql_nv_vn.id')
            ->leftJoin('dm_phonghoc', 'ql_phanlop.id_phong_hoc', '=', 'dm_phonghoc.id')
            ->leftJoin('dm_lop', 'ql_phanlop.id_lop', '=', 'dm_lop.id')
            ->leftJoin('dm_khoi', 'ql_phanlop.id_khoi', '=', 'dm_khoi.id')
            ->leftJoin('dm_hedaotao', 'ql_phanlop.id_he_dao_tao', '=', 'dm_hedaotao.id')
            ->leftJoin('dm_khoahoc', 'ql_phanlop.id_khoa_hoc', '=', 'dm_khoahoc.id')
            ->leftJoin('tt_ky', 'ql_phanlop.id_ky', '=', 'tt_ky.id');

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
        $data['he_dao_taos'] = HeDaoTaoModel::all();
        $data['khoa_hocs'] = KhoaHocModel::where('trang_thai', 1)->get();
        $data['kys'] = KyModel::where('nam_hoc', '>=', date('Y'))->get();

        return view('Quan_ly_phan_lop.quan_ly_phan_lop', $data);
    }

    public function viewThemPhanLop(Request $request)
    {
        $data['lops'] = LopModel::all();
        $data['phong_hocs'] = PhongHocModel::where('trang_thai',1)->get();
        $data['gv_nuoc_ngoais'] = NhanVienModel::leftJoin('dm_chucvu','dm_chucvu.id','=','ql_nhanvien.id_chuc_vu')
            ->where('quoc_tich', '!=', 'Việt Nam')->whereNull('ngay_nghi_viec')->get();
        $data['gv_cns'] = NhanVienModel::where('quoc_tich', 'Việt Nam')
            ->whereNull('ngay_nghi_viec')
            ->get();
        $data['gv_viets'] = NhanVienModel::leftJoin('dm_chucvu','dm_chucvu.id','=','ql_nhanvien.id_chuc_vu')
            ->where('quoc_tich', 'Việt Nam')->whereNull('ngay_nghi_viec')->get();
        $data['khois'] = KhoiModel::all();
        $data['he_dao_taos'] = HeDaoTaoModel::all();
        $data['khoa_hocs'] = KhoaHocModel::where('trang_thai',1)->get();
        $data['kys'] = KyModel::where('nam_hoc','>=',date('Y'))->get();
        return view('Quan_ly_phan_lop.them_phan_lop', $data);
    }
    public function viewPhanLop(Request $request)
    {
        $data = [];
        $data['hoc_sinhs'] = HocSinhModel::all();
        return view('Quan_ly_phan_lop.phan_lop', $data);
    }

    public function viewDiemDanh(Request $request)
    {
        $query = HocSinhModel::query()->select ('*','ql_hocsinh.id as hoc_sinh_id')
        ->leftJoin('ql_phanlop','ql_phanlop.id','=','ql_hocsinh.id_phan_lop')
        ->leftJoin('ql_diemdanh','ql_diemdanh.id_hoc_sinh','=','ql_hocsinh.id')
        ->where('id_phan_lop',$request->id)
        ->where('ngay',date('Y-m-d'));
        $data['hoc_sinhs'] = $query->get();
        return view('', $data);
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
        $phan_lop->khoa_hoc = $request->khoa_hoc;
        $phan_lop->id_ky = $request->ky;
        $phan_lop->save();
        return redirect()->route('ql_phanlop')->with('bao_loi','Lưu thành công');
    }
    public function xlPhanLop(Request $request)
    {
        $phan_lop = PhanLopModel::find($request->id);
        foreach($request->hoc_sinhs as $id_hoc_sinh){
            $hoc_sinh = HocSinhModel::find($id_hoc_sinh);
            $hoc_sinh->id_phan_lop = $phan_lop->id;
            $hoc_sinh->save();
        }
        return redirect()->route('ql_phanlop')->with('bao_loi','Lưu thành công');
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
        $phan_lop->khoa_hoc = $request->khoa_hoc;
        $phan_lop->save();
        return redirect()->route('ql_phanlop')->with('bao_loi','Lưu thành công');
    }
    public function export_lop(Request $request){
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
        foreach($ds_diem_danh as $diem_danh){
            $di_hoc = DiemDanhModel::where('id_hoc_sinh', $diem_danh)->where('ngay',date('Y-m-d'))->where('loai_diem_danh',1)->first();
            $di_hoc->trang_thai = 1;
            $di_hoc->save();
        }
        return redirect()->route('ql_phanlop')->with('bao_loi','Lưu thành công');
    }
}
