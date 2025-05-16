<?php

namespace App\Http\Controllers;

use App\Imports\MenuImport;
use App\Models\BangGiaModel;
use App\Models\ChucVuModel;
use App\Models\DichVuModel;
use App\Models\DiemDanhModel;
use App\Models\GiayToModel;
use App\Models\HocSinhModel;
use App\Models\LoTrinhXeModel;
use App\Models\NhanVienModel;
use App\Models\ThucDonModel;
use App\Models\TTDiXeModel;
use App\Models\TuanModel;
use App\Models\TuyenXeModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
    //Tuyen xe
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
        $tuyen_xe->save();
        return redirect()->route('ql_lt')->with('bao_loi','Lưu thành công');
    }
    //Lich trinh xe
    public function viewQuanLyLoTrinh(Request $request)
    {
        $data = [];
        $monitor = ChucVuModel::where('ten_chuc_vu','Nhân viên Monitor')->first();
        $lai_xe = ChucVuModel::where('ten_chuc_vu','Lái xe')->first();
        $data['lai_xes'] = NhanVienModel::where('id_chuc_vu', $lai_xe->id )->get();
        $data['monitors'] = NhanVienModel::where('id_chuc_vu', $monitor->id)->get();
        $data['tuyen_xes'] = TuyenXeModel::all();
        $query = LoTrinhXeModel::query()
        ->select('ql_lotrinhxe.*','ql_lai_xe.ho_ten as ten_lai_xe','ql_monitor.ho_ten as ten_monitor','dm_tuyenxe.ten_tuyen_xe')
        ->leftJoin('dm_tuyenxe', 'ql_lotrinhxe.id_tuyen_xe', '=', 'dm_tuyenxe.id')
        ->leftJoin('ql_nhanvien as ql_lai_xe', 'ql_lotrinhxe.id_lai_xe', '=', 'ql_lai_xe.id')
        ->leftJoin('ql_nhanvien as ql_monitor', 'ql_lotrinhxe.id_monitor', '=', 'ql_monitor.id');
        if ($request->filled('lai_xe')) {
            $query->where('ql_lotrinhxe.id_lai_xe', $request->lai_xe);
            $data['lai_xe'] = $request->lai_xe;
        }
        if ($request->filled('monitor')) {
            $query->where('ql_lotrinhxe.id_monitor', $request->monitor);
            $data['monitor'] = $request->monitor;
        }
        if ($request->filled('tuyen_xe')) {
            $query->where('ql_lotrinhxe.id_tuyen_xe', $request->tuyen_xe);
            $data['tuyen_xe'] = $request->tuyen_xe;
        }
        if ($request->filled('bien_so_xe')) {
            $query->where('ql_lotrinhxe.bien_so_xe', 'like', '%' . $request->bien_so_xe . '%');
            $data['bien_so_xe'] = $request->bien_so_xe;
        }
        if ($request->filled('tu_ngay')) {
            $query->where('ql_lotrinhxe.ngay', '>=', $request->tu_ngay);
            $data['tu_ngay'] = $request->tu_ngay;
        }
        if ($request->filled('den_ngay')) {
            $query->where('ql_lotrinhxe.ngay', '<=', $request->den_ngay);
            $data['den_ngay'] = $request->den_ngay;
        }
        $data['lo_trinh_xes'] = $query->orderBy('ql_lotrinhxe.id')->get();
        return view('Quan_ly_dich_vu.Quan_ly_lo_trinh_xe.quan_ly_lo_trinh_xe', $data);
    }
    public function viewThemLoTrinh()
    {
        $data = [];
        $monitor = ChucVuModel::where('ten_chuc_vu','Nhân viên Monitor')->first();
        $lai_xe = ChucVuModel::where('ten_chuc_vu','Lái xe')->first();
        $data['tuyen_xes'] = TuyenXeModel::all();
        $data['lai_xes'] = NhanVienModel::where('id_chuc_vu', $lai_xe->id )->get();
        $data['monitors'] = NhanVienModel::where('id_chuc_vu', $monitor->id)->get();
        return view('Quan_ly_dich_vu.Quan_ly_lo_trinh_xe.them_lo_trinh_xe', $data);
    }
    public function viewSuaLoTrinh(Request $request)
    {
        $data = [];
        $monitor = ChucVuModel::where('ten_chuc_vu','Nhân viên Monitor')->first();
        $lai_xe = ChucVuModel::where('ten_chuc_vu','Lái xe')->first();
        $data['lai_xes'] = NhanVienModel::where('id_chuc_vu', $lai_xe->id )->get();
        $data['monitors'] = NhanVienModel::where('id_chuc_vu', $monitor->id)->get();
        $data['tuyen_xes'] = TuyenXeModel::all();
        $data['lo_trinh_xe'] = LoTrinhXeModel::find($request->id);
        return view('Quan_ly_dich_vu.Quan_ly_lo_trinh_xe.sua_lo_trinh_xe', $data);
    }
    public function viewDiemDanhBus (Request $request)
    {
        $data = [];
        $data['lo_trinh'] = LoTrinhXeModel::select('ql_lotrinhxe.*','dm_tuyenxe.ten_tuyen_xe','lai_xe.ho_ten as ho_ten_lai_xe','monitor.ho_ten as ho_ten_monitor')
        ->leftjoin('ql_nhanvien as lai_xe','lai_xe.id','=','ql_lotrinhxe.id_lai_xe')
        ->leftjoin('ql_nhanvien as monitor','monitor.id','=','ql_lotrinhxe.id_monitor')
        ->leftJoin('dm_tuyenxe','dm_tuyenxe.id','=','ql_lotrinhxe.id_tuyen_xe')
        ->find( $request->id);
        $query = TTDiXeModel::query()->select('ql_hocsinh.*','dm_tuyenxe.ten_tuyen_xe')
            ->leftJoin('ql_hocsinh','tt_hsdixe.id_hoc_sinh','=','ql_hocsinh.id')
            ->leftJoin('ql_lotrinhxe','ql_lotrinhxe.id_tuyen_xe','=','tt_hsdixe.id_tuyen_xe')
            ->leftJoin('dm_tuyenxe','ql_lotrinhxe.id_tuyen_xe','=','dm_tuyenxe.id')
            ->where('ql_lotrinhxe.id', $request->id);
        $data['hoc_sinhs'] = $query->orderBy('id_hoc_sinh','ASC')->get();
        // dd($data['hoc_sinhs'] );
        return view('Quan_ly_dich_vu.Quan_ly_lo_trinh_xe.diem_danh_xe_bus', $data);
    }
    public function xlThemLoTrinh(Request $request)
    {
        if(empty($request->id)) $tuyen_xe = new LoTrinhXeModel();
        else    $tuyen_xe = LoTrinhXeModel::find($request->id);
        $tuyen_xe->id_lai_xe = $request->lai_xe;
        $tuyen_xe->id_monitor = $request->monitor;
        $tuyen_xe->id_tuyen_xe = $request->tuyen_xe;
        $tuyen_xe->ngay = date('Y-m-d');
        $tuyen_xe->bien_so_xe = $request->bien_so_xe;
        $tuyen_xe->save();
        return redirect()->route('ql_lt')->with('bao_loi','Lưu thành công');
    }
    //DK bus
    public function viewQuanLyDangKyBusHS(Request $request)
    {
        $data = [];
        $query = TTDiXeModel::select('tt_hsdixe.*','ql_hocsinh.id as hs_id','ql_hocsinh.ho_ten','dm_tuyenxe.ten_tuyen_xe')
        ->leftJoin('ql_hocsinh','ql_hocsinh.id','=','tt_hsdixe.id_hoc_sinh')
        ->leftJoin('dm_tuyenxe','dm_tuyenxe.id','=','tt_hsdixe.id_tuyen_xe');
        if($request->filled('ho_ten_search')){
            $query->where('ho_ten','like','%'.$request->ho_ten_search.'%')
            ->orWhere('ql_hocsinh.id','like','%'.$request->ho_ten_search.'%');
            $data['ho_ten_search'] = $request->ho_ten_search;
        }
        if($request->filled('tuyen_xe_search')){
            $query->where('id_tuyen_xe',$request->tuyen_xe_search);
            $data['tuyen_xe_search'] = $request->tuyen_xe_search;
        }
        $data['dky_bus_hss'] = $query->orderBy('id_tuyen_xe','asc')->get();
        $data['tuyen_xes'] = TuyenXeModel::all();
        return view('Quan_ly_dich_vu.Dang_ky_xe_bus.ql_dang_ky_xe_bus_hs', $data);
    }
    public function viewDangKyBusHS(Request $request)
    {
        $data = [];
        $data['hoc_sinhs'] = HocSinhModel::where('di_bus',0)->get();
        $data['tuyen_xes'] = TuyenXeModel::all();
        return view('Quan_ly_dich_vu.Dang_ky_xe_bus.dang_ky_xe_bus', $data);
    }
    public function xlDKBusHS(Request $request)
    {
        $di_xe = new TTDiXeModel();
        $giay_to = new GiayToModel();
        $hoc_sinh = HocSinhModel::find($request->hoc_sinh);
        $hoc_sinh->di_bus = 1;
        $giay_to->id_hoc_sinh = $request->hoc_sinh;
        $giay_to->ten_giay_to = 'Đăng ký: Dịch vụ xe bus - '.date('Y-m-d');
        $di_xe->id_hoc_sinh = $request->hoc_sinh;
        $di_xe->id_tuyen_xe = $request->tuyen_xe;
        $di_xe->diem_don = $request->diem_don;
        $di_xe->so_km = $request->so_km."KM";
        $di_xe->nguoi_dua_don = $request->nguoi_dua_don;
        $di_xe->lien_he_khan = $request->lien_he_khan;
        $di_xe->save();
        if ($request->hasFile('file')) {
            $file = $request->file;
            $filename = md5(time().rand(1,100) . $request->file->getClientOriginalName()) . '.' . $request->file->getClientOriginalExtension();
            $file->move('Giay_to/'.$request->hoc_sinh.'', $filename);
            $giay_to->link_giay_to = $filename;
        }
        $giay_to->save();
        $hoc_sinh->save();
        return redirect()->route('ql_dk_bus_hs')->with('bao_loi','Lưu thành công');
    }

    public function xlDKAnHS(Request $request)
    {
        $giay_to = new GiayToModel();
        $hoc_sinh = HocSinhModel::find($request->hoc_sinh);
        $hoc_sinh->an_com = 1;
        $giay_to->id_hoc_sinh = $request->hoc_sinh;
        $giay_to->ten_giay_to = 'Đăng ký: Dịch vụ xe bus - '.date('Y-m-d');
        if ($request->hasFile('file')) {
            $file = $request->file;
            $filename = md5(time().rand(1,100) . $request->file->getClientOriginalName()) . '.' . $request->file->getClientOriginalExtension();
            $file->move('Giay_to/'.$request->hoc_sinh.'', $filename);
            $giay_to->link_giay_to = $filename;
        }
        $giay_to->save();
        $hoc_sinh->save();
        return redirect()->route('ql_dk_bus_hs')->with('bao_loi','Lưu thành công');
    }
    
    //Thuc don
    public function viewQuanLyThucDon(Request $request){
        $data=[];
        $ngay = date('Y-m-d');
        $tuan = TuanModel::where('tu_ngay','<=',$ngay)->where('den_ngay','>=',$ngay)->first();
        if($request->filled('tuan_search')){
            $tuan = TuanModel::find($request->tuan_search);
        }
        $thuc_don = ThucDonModel::where('id_tuan',$tuan->id)->orderBy('thu','asc')->get();
        $menu = [];
        foreach($thuc_don as $td){
            $menu[] = $td;
        }
        $data['tuan_search'] = $tuan->id;
        $data['tuans'] = TuanModel::where('nam',date('Y'))->get();
        $data['thuc_don'] = $menu;
        return view('Quan_ly_dich_vu.Quan_ly_thuc_don.quan_ly_thuc_don', $data);
    }
    public function importMenu(Request $request){
        Excel::import(new MenuImport, $request->file('file'));
        return redirect()->route('ql_td')->with('bao_loi','Lưu thành công');
    }
    //View Phu huynh
    public function viewPhuHuynhBangGia(Request $request)
    {
        $data = [];
        return view('Phu_huynh_bang_gia.phu_huynh_bang_gia', $data);
    }
}
