<?php

namespace App\Http\Controllers;

use App\Exports\HocSinhExport;
use App\Imports\HocSinhImport;
use App\Http\Controllers\Controller;
use App\Models\GiayToModel;
use App\Models\HocSinhModel;
use App\Models\KhoaHocModel;
use App\Models\MonHocModel;
use App\Models\HocPhiModel;
use App\Models\LopModel;
use App\Models\TaiKhoanModel;
use App\Models\TTDiXeModel;
use App\Models\TuyenXeModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QLHocSinhController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data = [];
        $query = HocSinhModel::query()->select ('ql_hocsinh.*','dm_khoahoc.ten_khoa_hoc')
        ->leftJoin('dm_khoahoc','dm_khoahoc.id','=','ql_hocsinh.id_khoa_hoc');
        if ($request->has('tk_ho_ten') && !empty($request->tk_ho_ten)){
            $query->where('ho_ten','like','%'.$request->tk_ho_ten.'%');
            $data['tk_ho_ten'] = $request->tk_ho_ten;
        }
        if ($request->has('tk_gioi_tinh') && $request->tk_gioi_tinh!=""){
            $query->where('gioi_tinh',$request->tk_gioi_tinh);
            $data['tk_gioi_tinh'] = $request->tk_gioi_tinh==0?"Nữ":"Nam";
        }
        if ($request->has('tk_quoc_tich') && !empty($request->tk_quoc_tich)){
            $query->where('quoc_tich','like','%'.$request->tk_quoc_tich.'%');
            $data['tk_quoc_tich'] = $request->tk_quoc_tich;
        }
        if ($request->has('tk_ngay_nhap_hoc') && !empty($request->tk_ngay_nhap_hoc)){
            $query->where('ngay_nhap_hoc',$request->tk_ngay_nhap_hoc);
            $data['tk_ngay_nhap_hoc'] = $request->tk_ngay_nhap_hoc;
        }
        if ($request->has('tk_ngay_thoi_hoc') && !empty($request->tk_ngay_thoi_hoc)){
            $query->where('ngay_thoi_hoc',$request->tk_ngay_thoi_hoc);
            $data['tk_ngay_thoi_hoc'] = $request->tk_ngay_thoi_hoc;
        }
        if ($request->has('tk_trang_thai') && $request->tk_trang_thai!=""){
            $query->where('trang_thai',$request->tk_trang_thai);
            if($request->tk_trang_thai==0) $data['tk_trang_thai']="inactive";
            elseif($request->tk_trang_thai==1) $data['tk_trang_thai']="active";
            else $data['tk_trang_thai']="preserveds";
        }
        if ($request->has('tk_khoa_hoc') && $request->tk_khoa_hoc!=""&& $request->tk_khoa_hoc!="all"){
            $query->where('id_khoa_hoc',$request->tk_khoa_hoc);
            $data['tk_khoa_hoc'] = $request->tk_khoa_hoc;
        }
        elseif($request->has('tk_khoa_hoc') && $request->tk_khoa_hoc==""){
            $khoa_hoc_hien_tai = KhoaHocModel::where('ten_khoa_hoc',date('Y'))->first();
            $query->where('id_khoa_hoc',$khoa_hoc_hien_tai->id);
        }
        $data['hoc_sinhs'] = $query->orderBy('id')->get();
        $data['khoa_hocs'] = KhoaHocModel::all();
        return view('Quan_ly_hoc_sinh.quan_ly_hoc_sinh', $data);
    }
    public function viewChiTiet(Request $request)
    {
        $data = [];
        $data['lops']= LopModel::all();
        $data['nang_khieu'] = MonHocModel::where('nang_khieu',1)->get();
        $data['hoc_sinh'] = HocSinhModel::select ('ql_hocsinh.*','dm_khoahoc.ten_khoa_hoc','tt_hsdixe.*','ql_hocsinh.id as hs_id')
            ->leftJoin('dm_khoahoc','dm_khoahoc.id','=','ql_hocsinh.id_khoa_hoc')
            ->leftJoin('tt_hsdixe','tt_hsdixe.id_hoc_sinh','=','ql_hocsinh.id')
            ->leftJoin('dm_tuyenxe','dm_tuyenxe.id','=','tt_hsdixe.id_tuyen_xe')
            ->find($request->id);
        return view('Quan_ly_hoc_sinh.xem_chi_tiet_hoc_sinh', $data);
    }
    public function viewThem(Request $request)
    {
        $data = [];
        $data['nang_khieu'] = MonHocModel::where('nang_khieu',1)->get();
        $data['khoa_hocs'] = KhoaHocModel::all();
        return view('Quan_ly_hoc_sinh.them_hoc_sinh', $data);
    }
    public function viewSua(Request $request)
    {
        $data = [];
        $data['nang_khieu'] = MonHocModel::where('nang_khieu',1)->get();
        $data['khoa_hocs'] = KhoaHocModel::all();
        $data['hoc_sinh'] = HocSinhModel::select ('ql_hocsinh.*','dm_khoahoc.ten_khoa_hoc','tt_hsdixe.*','ql_hocsinh.id as hs_id')
        ->leftJoin('dm_khoahoc','dm_khoahoc.id','=','ql_hocsinh.id_khoa_hoc')
        ->leftJoin('tt_hsdixe','tt_hsdixe.id_hoc_sinh','=','ql_hocsinh.id')
        ->leftJoin('dm_tuyenxe','dm_tuyenxe.id','=','tt_hsdixe.id_tuyen_xe')
        ->find($request->id);
        $data['tuyen_xes'] = TuyenXeModel::all();
        return view('Quan_ly_hoc_sinh.sua_hoc_sinh', $data);
    }
    public function viewHienThiHoSo(Request $request)
    {
        $data = [];
        $data['giay_to'] = GiayToModel::where('id_hoc_sinh',$request->id)->get();
        $data['hoc_sinh'] = HocSinhModel::find($request->id);
        return view('Quan_ly_hoc_sinh.hien_thi_ho_so', $data);
    }
//-------------------------------------------------
    public function xlThem(Request $request)
    { 
        $all_hoc_sinh = HocSinhModel::all();
        $so_hs = count($all_hoc_sinh);
        $ma_hs = 'SB'.str_pad($so_hs+1,10,'0',STR_PAD_LEFT);
        $hoc_sinh = new HocSinhModel();
        $hoc_sinh->id = $ma_hs;
        $hoc_sinh->ho_ten = $request->ho_ten;
        $hoc_sinh->ngay_nhap_hoc = $request->ngay_nhap_hoc;
        $hoc_sinh->ngay_thoi_hoc = $request->ngay_thoi_hoc;
        $hoc_sinh->nickname = $request->nickname;
        $hoc_sinh->gioi_tinh = $request->gioi_tinh;
        $hoc_sinh->ngay_sinh = $request->ngay_sinh;
        $hoc_sinh->quoc_tich = $request->quoc_tich;
        $hoc_sinh->ngon_ngu = $request->ngon_ngu;
        $hoc_sinh->can_nang = $request->can_nang;
        $hoc_sinh->chieu_cao = $request->chieu_cao;
        $hoc_sinh->noi_sinh = $request->noi_sinh;
        $hoc_sinh->thong_tin_suc_khoe = $request->thong_tin_suc_khoe;
        $hoc_sinh->ho_ten_me = $request->ho_ten_me;
        $hoc_sinh->sdt_me = $request->sdt_me;
        $hoc_sinh->email_me = $request->email_me;
        $hoc_sinh->nghe_nghiep_me = $request->nghe_nghiep_me;
        $hoc_sinh->cmnd_me = $request->cmnd_me;
        $hoc_sinh->nam_sinh_me = $request->nam_sinh_me;
        $hoc_sinh->quoc_tich_me = $request->quoc_tich_me;
        $hoc_sinh->ho_ten_bo = $request->ho_ten_bo;
        $hoc_sinh->sdt_bo = $request->sdt_bo;
        $hoc_sinh->email_bo = $request->email_bo;
        $hoc_sinh->nghe_nghiep_bo = $request->nghe_nghiep_bo;
        $hoc_sinh->cmnd_bo = $request->cmnd_bo;
        $hoc_sinh->nam_sinh_bo = $request->nam_sinh_bo;
        $hoc_sinh->quoc_tich_bo = $request->quoc_tich_bo;
        $hoc_sinh->thuong_tru = $request->thuong_tru;
        $hoc_sinh->dia_chi = $request->dia_chi;
        $hoc_sinh->loai_hoc_phi = $request->loai_hoc_phi;
        $tai_khoan = new TaiKhoanModel();
        $tai_khoan->tai_khoan = $ma_hs;
        $tai_khoan->id_hoc_sinh = $ma_hs;
        $tai_khoan->la_khach = true;
        $tai_khoan->id_quyen = 2;
        $hoc_sinh->save();
        $tai_khoan->save();
        return redirect()->route('ql_hs');
    }
    public function xlSua(Request $request)
    {
        $hoc_sinh = HocSinhModel::find($request->id);
        $di_xe = TTDiXeModel::where('id_hoc_sinh',$request->id)->first();
        $hoc_sinh->ho_ten = $request->ho_ten;
        $hoc_sinh->ngay_nhap_hoc = $request->ngay_nhap_hoc;
        $hoc_sinh->ngay_thoi_hoc = $request->ngay_thoi_hoc;
        $hoc_sinh->nickname = $request->nickname;
        $hoc_sinh->gioi_tinh = $request->gioi_tinh;
        $hoc_sinh->ngay_sinh = $request->ngay_sinh;
        $hoc_sinh->quoc_tich = $request->quoc_tich;
        $hoc_sinh->ngon_ngu = $request->ngon_ngu;
        $hoc_sinh->can_nang = $request->can_nang;
        $hoc_sinh->chieu_cao = $request->chieu_cao;
        $hoc_sinh->noi_sinh = $request->noi_sinh;
        $hoc_sinh->thong_tin_suc_khoe = $request->thong_tin_suc_khoe;
        $hoc_sinh->ho_ten_me = $request->ho_ten_me;
        $hoc_sinh->sdt_me = $request->sdt_me;
        $hoc_sinh->email_me = $request->email_me;
        $hoc_sinh->nghe_nghiep_me = $request->nghe_nghiep_me;
        $hoc_sinh->cmnd_me = $request->cmnd_me;
        $hoc_sinh->nam_sinh_me = $request->nam_sinh_me;
        $hoc_sinh->quoc_tich_me = $request->quoc_tich_me;
        $hoc_sinh->ho_ten_bo = $request->ho_ten_bo;
        $hoc_sinh->sdt_bo = $request->sdt_bo;
        $hoc_sinh->email_bo = $request->email_bo;
        $hoc_sinh->nghe_nghiep_bo = $request->nghe_nghiep_bo;
        $hoc_sinh->cmnd_bo = $request->cmnd_bo;
        $hoc_sinh->nam_sinh_bo = $request->nam_sinh_bo;
        $hoc_sinh->quoc_tich_bo = $request->quoc_tich_bo;
        $hoc_sinh->thuong_tru = $request->thuong_tru;
        $hoc_sinh->dia_chi = $request->dia_chi;
        $hoc_sinh->loai_hoc_phi = $request->loai_hoc_phi;
        if(!empty($di_xe)){
            if($request->tuyen_xe=='huy') $di_xe->delete();
            else{
                $hoc_sinh->di_bus = 0;
                $di_xe->id_tuyen_xe = $request->tuyen_xe;
                $di_xe->diem_don = $request->diem_don;
                $di_xe->so_km = $request->so_km;
                $di_xe->nguoi_dua_don = $request->nguoi_dua_don;
                $di_xe->lien_he_khan = $request->lien_he_khan;
                $di_xe->save();
            }
        }
        $hoc_sinh->save();
        return redirect()->route('ql_hs');
    }
    public function xlThoiHoc(Request $request)
    {
        // dd($request);
        $hoc_sinh = HocSinhModel::find($request->id);
        $giay_to = new GiayToModel();
        $giay_to->id_hoc_sinh = $request->id;
        $giay_to->ten_giay_to = 'Thôi học: '.$request->ten_giay_to;
        if ($request->hasFile('file')) {
            $file = $request->file;
            $filename = md5(time().rand(1,100) . $request->file->getClientOriginalName()) . '.' . $request->file->getClientOriginalExtension();
            $file->move('Giay_to/'.$request->id.'', $filename);
            $giay_to->link_giay_to = $filename;
        }
        $hoc_sinh->trang_thai = 0;
        $hoc_sinh->id_phan_lop = null;
        $hoc_sinh->ngay_thoi_hoc = $request->ngay_thoi_hoc_update;
        $hoc_sinh->save();
        $giay_to->save();
        return redirect()->back()->with('bao_loi','Lưu thành công');
    }
    public function xlNhapHocLai(Request $request)
    {
        $hoc_sinh = HocSinhModel::find($request->id);
        $giay_to = new GiayToModel();
        $giay_to->id_hoc_sinh = $request->id;
        $giay_to->ten_giay_to = 'Quay lại: '.$request->ten_giay_to;
        if ($request->hasFile('file')) {
            $file = $request->file;
            $filename = md5(time().rand(1,100) . $request->file->getClientOriginalName()) . '.' . $request->file->getClientOriginalExtension();
            $file->move('Giay_to/'.$request->id.'', $filename);
            $giay_to->link_giay_to = $filename;
        }
        $hoc_sinh->trang_thai = 1;
        $hoc_sinh->ngay_thoi_hoc = null;
        $hoc_sinh->ngay_nhap_hoc = $request->ngay_nhap_hoc_update;
        $hoc_sinh->save();
        $giay_to->save();
        return redirect()->back()->with('bao_loi','Lưu thành công');
    }
    public function xlBaoLuu(Request $request)
    {
        $hoc_sinh = HocSinhModel::find($request->id);
        $giay_to = new GiayToModel();
        $giay_to->id_hoc_sinh = $request->id;
        $giay_to->ten_giay_to = 'Bảo lưu: '.$request->ten_giay_to;
        if ($request->hasFile('file')) {
            $file = $request->file;
            $filename = md5(time().rand(1,100) . $request->file->getClientOriginalName()) . '.' . $request->file->getClientOriginalExtension();
            $file->move('Giay_to/'.$request->id.'', $filename);
            $giay_to->link_giay_to = $filename;
        }
        $hoc_sinh->trang_thai = 2;
        $hoc_sinh->save();
        $giay_to->save();
        return redirect()->back()->with('bao_loi','Lưu thành công');
    }
    public function xlQuayLai(Request $request)
    {
        $hoc_sinh = HocSinhModel::find($request->id);
        $hoc_sinh->trang_thai = 1;
        $hoc_sinh->save();
        return redirect()->back()->with('bao_loi','Lưu thành công');
    }
    public function xlChuyenLop(Request $request)
    {
        $hoc_sinh = HocSinhModel::find($request->id);
        $giay_to = new GiayToModel();
        $giay_to->id_hoc_sinh = $request->id;
        $giay_to->ten_giay_to = 'Chuyển lớp: '.$request->ten_giay_to;
        if ($request->hasFile('file')) {
            $file = $request->file;
            $filename = md5(time().rand(1,100) . $request->file->getClientOriginalName()) . '.' . $request->file->getClientOriginalExtension();
            $file->move('Giay_to/'.$request->id.'', $filename);
            $giay_to->link_giay_to = $filename;
        }
        $hoc_sinh->id_phan_lop = $request->phan_lop;
        $hoc_sinh->save();
        $giay_to->save();
        return redirect()->back()->with('bao_loi','Lưu thành công');
    }
    public function export(Request $request){
        $query = HocSinhModel::query()->select ('*');
        if ($request->has('tk_ho_ten') && !empty($request->tk_ho_ten)){
            $query->where('ho_ten','like','%'.$request->tk_ho_ten.'%');
            $data['tk_ho_ten'] = $request->tk_ho_ten;
        }
        if ($request->has('tk_gioi_tinh') && $request->tk_gioi_tinh!=""){
            $query->where('gioi_tinh',$request->tk_gioi_tinh);
            $data['tk_gioi_tinh'] = $request->tk_gioi_tinh==0?"Nữ":"Nam";
        }
        if ($request->has('tk_quoc_tich') && !empty($request->tk_quoc_tich)){
            $query->where('quoc_tich','like','%'.$request->tk_quoc_tich.'%');
            $data['tk_quoc_tich'] = $request->tk_quoc_tich;
        }
        if ($request->has('tk_ngay_nhap_hoc') && !empty($request->tk_ngay_nhap_hoc)){
            $query->where('ngay_nhap_hoc',$request->tk_ngay_nhap_hoc);
            $data['tk_ngay_nhap_hoc'] = $request->tk_ngay_nhap_hoc;
        }
        if ($request->has('tk_ngay_thoi_hoc') && !empty($request->tk_ngay_thoi_hoc)){
            $query->where('ngay_thoi_hoc',$request->tk_ngay_thoi_hoc);
            $data['tk_ngay_thoi_hoc'] = $request->tk_ngay_thoi_hoc;
        }
        if ($request->has('tk_trang_thai') && $request->tk_trang_thai!=""){
            dump($request->trang_thai);
            $query->where('trang_thai',$request->tk_trang_thai);
            $data['tk_trang_thai'] = $request->tk_trang_thai==0?"active":"inactive";
        }
        $query = $query->orderBy('id')->get();
        return Excel::download(new HocSinhExport($query), 'export_hs.xlsx');
    }
    public function import(Request $request){
        Excel::import(new HocSinhImport, $request->file('file'));
        return redirect()->route('ql_hs');
    }
    public function viewHienThiThanhToan(Request $request)
    {
        $data = [];
        $query = HocPhiModel::query()
            ->select('ql_hocphi.*', 'ql_hocsinh.ho_ten')
            ->leftJoin('ql_hocsinh', 'ql_hocphi.id_hoc_sinh', '=', 'ql_hocsinh.id')
            ->where('ql_hocphi.id_hoc_sinh', $request->id);

        $data['thanh_toan'] = $query->orderBy('ql_hocphi.id', 'desc')->first();
        return view('Quan_ly_hoc_sinh.hien_thi_thanh_toan', $data);
    }
    // Phu huynh
    public function viewPhuHuynhThanhToan(Request $request)
    {
        $data = [];
        return view('Phu_huynh_thanh_toan.phu_huynh_thanh_toan', $data);
    }
}
