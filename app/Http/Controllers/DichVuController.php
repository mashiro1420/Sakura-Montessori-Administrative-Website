<?php

namespace App\Http\Controllers;

use App\Models\BangGiaModel;
use App\Models\DichVuModel;
use App\Models\DiemDanhModel;
use App\Models\HocSinhModel;
use App\Models\LoTrinhXeModel;
use App\Models\NhanVienModel;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    public function viewQuanLyBangGia(Request $request)
    {
        $data = [];
        $query = BangGiaModel::query()
            ->leftJoin('dm_dichvu', 'ql_banggia.id_dich_vu', '=', 'dm_dichvu.id')
            ->select('ql_banggia.*', 'dm_dichvu.ten_dich_vu');
        if ($request->filled('ten_gia_search')) {
            $query->where('ten_gia', 'like', '%' . $request->ten_gia_search . '%');
        }
        if ($request->filled('search_dich_vu')) {
            $query->where('id_dich_vu', $request->search_dich_vu);
        }   
        $data['bang_gias'] = $query->orderBy('ql_banggia.id')
            ->get();
        $data['dich_vus'] = DichVuModel::all();
        $data['ten_gia_search'] = $request->ten_gia_search;
        $data['search_dich_vu'] = $request->search_dich_vu;
        return view('Quan_ly_dich_vu.Quan_ly_bang_gia.quan_ly_bang_gia', $data);
    }
    public function viewThemBangGia()
    {
        $data = [];
        $data['dich_vus'] = DichVuModel::all();
        return view('Quan_ly_dich_vu.Quan_ly_bang_gia.them_bang_gia', $data);
    }
    public function  viewSuaBangGia(Request $request)
    {
        $data = [];
        $data['bang_gia'] = BangGiaModel::find($request->id);
        $data['dich_vus'] = DichVuModel::all();
        return view('Quan_ly_dich_vu.Quan_ly_bang_gia.sua_bang_gia', $data);
    }
    public function xlThemGia(Request $request)
    {
        $gia = new BangGiaModel();
        $gia->id_dich_vu = $request->dich_vu;
        $gia->ten_gia = $request->ten_gia;
        $gia->dinh_nghia = $request->dinh_nghia;
        $gia->gia = $request->gia;
        $gia->save();
        return redirect()->route('ql_bg')->with('bao_loi','Lưu thành công');
    }
public function xlSuaGia(Request $request)
    {
        $gia = BangGiaModel::find($request->id);
        $gia->id_dich_vu = $request->dich_vu;
        $gia->ten_gia = $request->ten_gia;
        $gia->dinh_nghia = $request->dinh_nghia;
        $gia->gia = $request->gia;
        $gia->save();
        return redirect()->route('ql_bg')->with('bao_loi','Lưu thành công');
    }
    public function xlDKTuyen(Request $request)
    {
        $ds_diem_danh = explode(',', $request->ds_diem_danh);
        foreach($ds_diem_danh as $diem_danh){
            $di_hoc = DiemDanhModel::where('id_hoc_sinh', $diem_danh)->where('ngay',date('Y-m-d'))->where('loai_diem_danh',2)->first();
            $di_hoc->trang_thai = 1;
            $di_hoc->save();
        }
        return redirect()->back()->with('bao_loi','Lưu thành công');
    }
    public function xlDiemDanh(Request $request)
    {
        $ds_diem_danh = explode(',', $request->ds_diem_danh);
        foreach($ds_diem_danh as $diem_danh){
            $di_hoc = DiemDanhModel::where('id_hoc_sinh', $diem_danh)->where('ngay',date('Y-m-d'))->where('loai_diem_danh',2)->first();
            $di_hoc->trang_thai = 1;
            $di_hoc->save();
        }
        return redirect()->back()->with('bao_loi','Lưu thành công');
    }
    public function xlUploadDiemDanh(Request $request)
    {
        $tuyen_xe = LoTrinhXeModel::find($request->id);
        if ($request->hasFile('file')) {
            $file = $request->file;
            $filename = md5(time().rand(1,100) . $request->file->getClientOriginalName()) . '.' . $request->file->getClientOriginalExtension();
            $file->move('Diem_danh/'.$tuyen_xe->ngay.$tuyen_xe->tuyen_xe.'', $filename);
            $tuyen_xe->danh_sach = $filename;
        }
    }
    //Lich trinh xe
    public function viewQuanLyLoTrinh(Request $request)
    {
        $data = [];
        $data['lai_xes'] = NhanVienModel::where('id_chuc_vu', 6)->get();
        $data['monitors'] = NhanVienModel::where('id_chuc_vu', 7)->get();
        $query = LoTrinhXeModel::query()
            ->select('ql_lotrinhxe.*')
            ->leftJoin('ql_nhanvien as ql_lai_xe', 'ql_lotrinhxe.id_lai_xe', '=', 'ql_lai_xe.id')
            ->leftJoin('ql_nhanvien as ql_monitor', 'ql_lotrinhxe.id_monitor', '=', 'ql_monitor.id');
        $data['lo_trinh_xes'] = $query->orderBy('ql_lotrinhxe.id')->get();
        return view('Quan_ly_dich_vu.Quan_ly_lo_trinh_xe.quan_ly_lo_trinh_xe', $data);
    }
    public function viewDangKyBus()
    {
        $data = [];
        $data['lai_xes'] = NhanVienModel::where('id_chuc_vu', 6)->get();
        $data['monitors'] = NhanVienModel::where('id_chuc_vu', 7)->get();
        return view('Quan_ly_dich_vu.Quan_ly_lo_trinh_xe.dang_ky_xe_bus', $data);
    }
    public function viewSuaLoTrinh(Request $request)
    {
        $data = [];
        $data['lai_xes'] = NhanVienModel::where('id_chuc_vu', 6)->get();
        $data['monitors'] = NhanVienModel::where('id_chuc_vu', 7)->get();
        $data['lo_trinh_xe'] = LoTrinhXeModel::find($request->id);
        return view('Quan_ly_dich_vu.Quan_ly_lo_trinh_xe.sua_dang_ky_xe', $data);
    }
}
