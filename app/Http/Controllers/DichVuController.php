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
use App\Models\TTDichVuHocSinhModel;
use App\Models\TTDiXeModel;
use App\Models\TuanModel;
use App\Models\TuyenXeModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Artisan;

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
        $ds_di_bus = HocSinhModel::where('id_phan_lop',$request->id)->get();
        foreach($ds_di_bus as $hoc_sinh){
            if(!in_array($hoc_sinh->id, $ds_diem_danh)){
                $diem_danh = DiemDanhModel::where('id_hoc_sinh', $hoc_sinh->id)->where('ngay',date('Y-m-d'))->where('loai_diem_danh',2)->first();
                if($diem_danh){
                    $diem_danh->trang_thai = 0;
                    $diem_danh->save();
                }
            }
        }
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
        if ($request->filled('lai_xe_search')) {
            $query->where('ql_lotrinhxe.id_lai_xe', $request->lai_xe_search);
            $data['lai_xe_search'] = $request->lai_xe_search;
        }
        if ($request->filled('monitor_search')) {
            $query->where('ql_lotrinhxe.id_monitor', $request->monitor_search);
            $data['monitor_search'] = $request->monitor_search;
        }
        if ($request->filled('tuyen_xe_search')) {
            $query->where('ql_lotrinhxe.id_tuyen_xe', $request->tuyen_xe_search);
            $data['tuyen_xe_search'] = $request->tuyen_xe_search;
        }
        if ($request->filled('bien_so_xe_search')) {
            $query->where('ql_lotrinhxe.bien_so_xe', 'like', '%' . $request->bien_so_xe_search . '%');
            $data['bien_so_xe_search'] = $request->bien_so_xe_search;
        }
        if ($request->filled('tu_ngay_search')) {
            $query->where('ql_lotrinhxe.ngay', '>=', $request->tu_ngay_search);
            $data['tu_ngay_search'] = $request->tu_ngay_search;
        }
        if ($request->filled('den_ngay_search')) {
            $query->where('ql_lotrinhxe.ngay', '<=', $request->den_ngay_search);
            $data['den_ngay_search'] = $request->den_ngay_search;
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
        $data['hoc_sinhs'] = HocSinhModel::query()->select ('tt_hsdixe.*','ql_hocsinh.ho_ten','ql_hocsinh.id as hs_id','ql_diemdanh.trang_thai')
        ->leftJoin('tt_hsdixe','tt_hsdixe.id_hoc_sinh','=','ql_hocsinh.id')
        ->leftJoin('ql_lotrinhxe','ql_lotrinhxe.id_tuyen_xe','=','tt_hsdixe.id_tuyen_xe')
        ->leftJoin('ql_diemdanh','ql_diemdanh.id_hoc_sinh','=','ql_hocsinh.id')
        ->where('loai_diem_danh',2)
        ->where('ql_diemdanh.ngay',date('Y-m-d'))
        ->get();
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
        Artisan::call('app:tao-diem-danh-command');
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
        $dich_vu = new TTDichVuHocSinhModel();
        $dich_vu->id_hoc_sinh = $request->hoc_sinh;
        if($request->so_km<=5) $dich_vu->id_dich_vu = BangGiaModel::where('ten_gia', 'Quãng 0-5KM')->first()->id;
        elseif($request->so_km>=6&&$request->so_km<=12) $dich_vu->id_dich_vu = BangGiaModel::where('ten_gia', 'Quãng 6-12KM')->first()->id;
        else $dich_vu->id_dich_vu = BangGiaModel::where('ten_gia', 'Quãng 13-20KM')->first()->id;
        $dich_vu->save();
        $hoc_sinh = HocSinhModel::find($request->hoc_sinh);
        $hoc_sinh->di_bus = 1;
        $giay_to->id_hoc_sinh = $request->hoc_sinh;
        $giay_to->ten_giay_to = 'Đăng ký: Dịch vụ xe bus - '.date('Y-m-d');
        $di_xe->id_hoc_sinh = $request->hoc_sinh;
        $di_xe->id_tuyen_xe = $request->tuyen_xe;
        $di_xe->diem_don = $request->diem_don;
        $di_xe->so_km = $request->so_km;
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
        $hoc_sinh->an_com = $request->an_com;
        $dich_vu = new TTDichVuHocSinhModel();
        $dich_vu->id_hoc_sinh = $request->hoc_sinh;
        if($request->an_com == 1) $dich_vu->id_dich_vu = BangGiaModel::where('ten_gia', 'Ăn đủ bữa')->first()->id;
        elseif($request->an_com == 2) $dich_vu->id_dich_vu = BangGiaModel::where('ten_gia', 'Ăn bán trú không ăn bữa phụ')->first()->id;
        $dich_vu->save();
        $giay_to->id_hoc_sinh = $request->hoc_sinh;
        $giay_to->ten_giay_to = 'Đăng ký: Dịch vụ ăn tại trường - '.date('Y-m-d');
        if ($request->hasFile('file')) {
            $file = $request->file;
            $filename = md5(time().rand(1,100) . $request->file->getClientOriginalName()) . '.' . $request->file->getClientOriginalExtension();
            $file->move('Giay_to/'.$request->hoc_sinh.'', $filename);
            $giay_to->link_giay_to = $filename;
        }
        $giay_to->save();
        $hoc_sinh->save();
        return redirect()->route('ql_dk_an_hs')->with('bao_loi','Lưu thành công');
    }
    public function xlHuyDKAnHS(Request $request)
    {
        // $giay_to = new GiayToModel();
        $hoc_sinh = HocSinhModel::find($request->id);
        if($hoc_sinh->an_com == 1) $bang_gia = BangGiaModel::where('ten_gia', 'Ăn đủ bữa')->first()->id;
        elseif($hoc_sinh->an_com == 2) $bang_gia = BangGiaModel::where('ten_gia', 'Ăn bán trú không ăn bữa phụ')->first()->id;
        $dich_vu = TTDichVuHocSinhModel::where('id_hoc_sinh',$request->id)->where('id_dich_vu',$bang_gia->id)->first();
        $dich_vu->delete();
        $hoc_sinh->an_com = 0;
        $hoc_sinh->save();
        return redirect()->route('ql_dk_an_hs')->with('bao_loi','Lưu thành công');
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
        $query = DichVuModel::query()->select('dm_dichvu.*', 'ql_banggia.gia', 'ql_banggia.ten_gia', 'ql_banggia.dinh_nghia')
            ->leftJoin('ql_banggia', 'ql_banggia.id_dich_vu', '=', 'dm_dichvu.id');

        if ($request->filled('search_dich_vu')) {
            $query->where('ten_dich_vu', 'like', '%' . $request->search_dich_vu . '%')
                ->orWhere('dm_dichvu.id', 'like', '%' . $request->search_dich_vu . '%');
            $data['search_dich_vu'] = $request->search_dich_vu;
        }
        if ($request->filled('search_name')) {
            $query->where('ten_gia', 'like', '%' . $request->search_name . '%')
                ->orWhere('ql_banggia.id', 'like', '%' . $request->search_name . '%');
            $data['search_name'] = $request->search_name;
        }
        $data['dich_vus'] = $query->get();
        $data['loai_dich_vus'] =DichVuModel::all();
        return view('Phu_huynh_bang_gia.phu_huynh_bang_gia', $data);
    }
    public function viewPhuHuynhTuyenXe(Request $request)
    {
        $hoc_sinh = HocSinhModel::find(session('id_hoc_sinh'));
        if($hoc_sinh->di_bus==0) return redirect()->route('ph_td')->with('bao_loi','Học sinh không đi xe');
        $query = LoTrinhXeModel::query()->select('*','lai_xe.ho_ten as ho_ten_lai_xe','monitor.ho_ten as ho_ten_monitor')
        ->leftJoin('dm_tuyenxe','dm_tuyenxe.id','=','ql_lotrinhxe.id_tuyen_xe')
        ->leftJoin('tt_hsdixe','tt_hsdixe.id_tuyen_xe','=','ql_lotrinhxe.id_tuyen_xe')
        ->leftJoin('ql_nhanvien as lai_xe','lai_xe.id','=','ql_lotrinhxe.id_lai_xe')
        ->leftJoin('ql_nhanvien as monitor','monitor.id','=','ql_lotrinhxe.id_monitor')
        ->where('id_hoc_sinh',$hoc_sinh->id);
        $data['lo_trinh_hom_nay'] =LoTrinhXeModel::query()->select('*','lai_xe.ho_ten as ho_ten_lai_xe','monitor.ho_ten as ho_ten_monitor','monitor_lh.sdt_rieng as sdt_monitor','lai_xe_lh.sdt_rieng as sdt_lai_xe')
        ->leftJoin('dm_tuyenxe','dm_tuyenxe.id','=','ql_lotrinhxe.id_tuyen_xe')
        ->leftJoin('tt_hsdixe','tt_hsdixe.id_tuyen_xe','=','ql_lotrinhxe.id_tuyen_xe')
        ->leftJoin('ql_nhanvien as lai_xe','lai_xe.id','=','ql_lotrinhxe.id_lai_xe')
        ->leftJoin('tt_lienhe as lai_xe_lh','lai_xe_lh.id_nhan_vien','=','lai_xe.id')
        ->leftJoin('ql_nhanvien as monitor','monitor.id','=','ql_lotrinhxe.id_monitor')
        ->leftJoin('tt_lienhe as monitor_lh','monitor_lh.id_nhan_vien','=','monitor.id')
        ->where('id_hoc_sinh',$hoc_sinh->id)->where('ngay',date('Y-m-d'))->first();
        if($request->filled('search_from')){
            $query->where('ngay','>=',$request->search_from );
            $data['search_from'] = $request->search_from;
        }
        if($request->filled('search_to')){
            $query->where('ngay','<=',$request->search_to );
            $data['search_to'] = $request->search_to;
        }
        $data['lo_trinh_xes'] = $query->orderBy('ngay','desc')->get();
        // dd($data['lo_trinh_xes']);
        return view('Phu_huynh_tuyen_xe.phu_huynh_tuyen_xe', $data);
    }
    public function viewPhuHuynhThucDon(Request $request)
    {
        $data = [];
        $ngay = date('Y-m-d');
        $tuan = TuanModel::where('tu_ngay', '<=', $ngay)->where('den_ngay', '>=', $ngay)->first();
        if ($request->filled('tuan_search')) {
            $tuan = TuanModel::find($request->tuan_search);
        }
        $thuc_don = ThucDonModel::where('id_tuan', $tuan->id)->orderBy('thu', 'asc')->get();
        $menu = [];
        foreach ($thuc_don as $td) {
            $menu[] = $td;
        }
        $data['tuan_search'] = $tuan->id;
        $data['tuans'] = TuanModel::where('nam', date('Y'))->get();
        $data['thuc_don'] = $menu;
        return view('Phu_huynh_thuc_don.phu_huynh_thuc_don', $data);
    }
    public function viewQuanLyDangKyAnHS(Request $request)
    {
        $data = [];
        $query = HocSinhModel::query()->where('an_com',1)->where('trang_thai',1);
        if ($request->filled('ho_ten_search')) {
            $query->where('ho_ten', 'like', '%' . $request->ho_ten_search . '%')
                ->orWhere('id', 'like', '%' . $request->ho_ten_search . '%')->where('an_com',1)->where('trang_thai',1);
            $data['ho_ten_search'] = $request->ho_ten_search;
        }
        $data['hoc_sinhs'] = $query->get();
        // dd($data['hoc_sinhs']);
        $data['hoc_sinh_mois'] = HocSinhModel::where('an_com',0)->where('trang_thai',1)->get();
        return view('Quan_ly_dich_vu.Dang_ky_an.ql_dang_ky_an', $data);
    }

    //Phu huynh
    public function viewPhuHuynhDiemDanhXeBus(Request $request)
    {
        $data['hoc_sinh'] = HocSinhModel::find(session('id_hoc_sinh'));
        if(empty($data['hoc_sinh']->di_bus)) return redirect()->route('ph_td')->with('bao_loi','Học sinh chưa được phân lớp');
        $diem_danhs = DiemDanhModel::query()->select('ql_diemdanh.*')
        ->leftJoin('tt_hsdixe','tt_hsdixe.id_hoc_sinh','=','ql_diemdanh.id_hoc_sinh')

        ->where('loai_diem_danh',2)
        ->where('ql_diemdanh.id_hoc_sinh',session('id_hoc_sinh'));
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
        // $data['hoc_sinhs'] = $query->orderBy('id_hoc_sinh', 'ASC')->get();
        return view('Phu_huynh_diem_danh.diem_danh_xe_bus', $data);
    }
}
