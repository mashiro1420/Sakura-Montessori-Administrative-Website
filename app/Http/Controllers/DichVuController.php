<?php

namespace App\Http\Controllers;

use App\Models\DiemDanhModel;
use App\Models\HocSinhModel;
use App\Models\LoTrinhXeModel;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    public function viewQuanLyBangGia(Request $request)
    {
        $data = [];
        $data['bang_gias'] = BangGiaModel::all();
        $data['dich_vus'] = DichVuModel::all();
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
}
