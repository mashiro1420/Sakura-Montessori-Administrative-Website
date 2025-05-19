<?php

namespace App\Http\Controllers;

use App\Exports\NhanVienExport;
use App\Http\Controllers\Controller;
use App\Imports\NhanVienImport;
use App\Models\ChucVuModel;
use App\Models\ChuyenNganhModel;
use App\Models\NhanVienModel;
use App\Models\PhanQuyenModel;
use App\Models\TaiKhoanModel;
use App\Models\TTBangCapModel;
use App\Models\TTDanSuModel;
use App\Models\TTHonNhanModel;
use App\Models\TTHopDongModel;
use App\Models\TTLienHeModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QLNhanVienController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data=[];
        $query = NhanVienModel::query()->select ('*');
        if ($request->has('tk_ho_ten') && !empty($request->tk_ho_ten)){
            $query->where('ho_ten','like','%'.$request->tk_ho_ten.'%');
            $data['tk_ho_ten'] = $request->tk_ho_ten;
        }
        if ($request->has('tk_chuc_vu')&& !empty($request->tk_chuc_vu)){
            $query->where('id_chuc_vu',$request->tk_chuc_vu);
            $data['tk_chuc_vu'] = $request->tk_chuc_vu;
        }
        if ($request->has('tk_gioi_tinh')&& !empty($request->tk_gioi_tinh)){
            $query->where('gioi_tinh',$request->tk_gioi_tinh);
            $data['tk_gioi_tinh'] = $request->tk_gioi_tinh;
        }
        if ($request->has('tk_noi_sinh')&& !empty($request->tk_noi_sinh)){
            $query->where('noi_sinh','like','%'.$request->tk_noi_sinh.'%');
            $data['tk_noi_sinh'] = $request->tk_noi_sinh;
        }
        if ($request->has('tk_trang_thai')&& !empty($request->tk_trang_thai)){
            if($request->tk_trang_thai == 'active'){
                $query->whereNull('ngay_nghi_viec');
            }
            else if($request->tk_trang_thai == 'inactive'){
                $query->whereNotNull('ngay_nghi_viec');
            }
            $data['tk_trang_thai'] = $request->tk_trang_thai;
        }
        $data['nhan_viens'] = $query->orderBy('id')->get();
        $data['chuc_vus'] = ChucVuModel::all();
        return view('Quan_ly_nhan_vien.quan_ly_nhan_vien',$data);
    }
    public function viewChiTiet(Request $request)
    {
        $data=[];
        //thông tin để chuyển sang bảng chi tiết
        $data['chi_tiet'] = NhanVienModel::find($request->id);
        $data['dan_su'] = TTDanSuModel::where('id_nhan_vien',$request->id)->first();
        $data['hon_nhan'] = TTHonNhanModel::where('id_nhan_vien',$request->id)->first();
        $data['lien_he'] = TTLienHeModel::where('id_nhan_vien',$request->id)->first();
        $data['bang_cap'] = TTBangCapModel::where('id_nhan_vien',$request->id)->first();
        $data['hop_dong'] = TTHopDongModel::where('id_nhan_vien',$request->id)->whereRaw('NOW() BETWEEN tt_hopdong.ngay_ky AND tt_hopdong.ngay_ket_thuc')->first();
        return view('Quan_ly_nhan_vien.xem_chi_tiet_nhan_vien',$data);
    }
    public function viewThem()
    {
        $data=[];
        $data['chuc_vus'] = ChucVuModel::all();
        return view('Quan_ly_nhan_vien.them_nhan_vien',$data);
    }
    public function viewSua(Request $request)
    {
        $data=[];
        $data['chuc_vus'] = ChucVuModel::all();
        $data['nhan_vien'] = NhanVienModel::find($request->id);
        return view('Quan_ly_nhan_vien.sua_nhan_vien',$data);
    }
    public function viewCapNhatTTDS(Request $request)
    {
        $data=[];
        $data['nhan_vien'] = NhanVienModel::find($request->id);
        $data['dan_su'] = TTDanSuModel::where('id_nhan_vien',$request->id)->first();
        return view('Quan_ly_nhan_vien.cap_nhat_thong_tin_dan_su',$data);
    }
    public function viewCapNhatTTHN(Request $request)
    {
        $data=[];
        $data['nhan_vien'] = NhanVienModel::find($request->id);
        $data['hon_nhan'] = TTHonNhanModel::where('id_nhan_vien',$request->id)->first();
        return view('Quan_ly_nhan_vien.cap_nhat_thong_tin_hon_nhan',$data);
    }
    public function viewCapNhatTTLH(Request $request)
    {
        $data=[];
        $data['nhan_vien'] = NhanVienModel::find($request->id);
        $data['lien_he'] = TTLienHeModel::where('id_nhan_vien',$request->id)->first();
        return view('Quan_ly_nhan_vien.cap_nhat_thong_tin_lien_he',$data);
    }
    public function viewCapNhatTTBC(Request $request)
    {
        $data=[];
        $data['nhan_vien'] = NhanVienModel::find($request->id);
        $data['bang_cap'] = TTBangCapModel::where('id_nhan_vien',$request->id)->first();
        $data['chuyen_nganhs'] = ChuyenNganhModel::all();
        return view('Quan_ly_nhan_vien.cap_nhat_thong_tin_bang_cap',$data);
    }
    public function viewCapNhatTTHD(Request $request)
    {
        $data=[];
        $data['nhan_vien'] = NhanVienModel::find($request->id);
        $data['hop_dong'] = TTHopDongModel::where('id_nhan_vien',$request->id)->first();
        return view('Quan_ly_nhan_vien.cap_nhat_thong_tin_hop_dong',$data);
    }
//----------------------------------------------------------------------------------------------------------------
    public function xlThem(Request $request){
        $all_nhan_vien = NhanVienModel::all();
        $so_nv = count($all_nhan_vien);
        $ma_nv = 'NV'.str_pad($so_nv+1,6,'0',STR_PAD_LEFT);
        $nhan_vien = new NhanVienModel();
        $nhan_vien->id = $ma_nv;
        $nhan_vien->ho_ten = $request->ho_ten;
        $nhan_vien->gioi_tinh = $request->gioi_tinh;
        $nhan_vien->noi_sinh = $request->noi_sinh;
        $nhan_vien->ngay_sinh = $request->ngay_sinh;
        $nhan_vien->ngay_vao_lam = $request->ngay_vao_lam;
        $nhan_vien->cmnd = $request->cmnd;
        $nhan_vien->ngay_cap = $request->ngay_cap;
        $nhan_vien->noi_cap = $request->noi_cap;
        $nhan_vien->quoc_tich = $request->quoc_tich;
        $nhan_vien->dan_toc = $request->dan_toc;
        $nhan_vien->ton_giao = $request->ton_giao;
        $nhan_vien->id_chuc_vu = $request->chuc_vu;
        $tai_khoan = new TaiKhoanModel();
        $tai_khoan->tai_khoan = $ma_nv;
        $tai_khoan->id_nhan_vien = $ma_nv;
        $tai_khoan->la_khach = false;
        $bang_cap = new TTBangCapModel(['id_nhan_vien'=>$ma_nv]);
        $lien_he = new TTLienHeModel(['id_nhan_vien'=>$ma_nv]);
        $dan_su = new TTDanSuModel(['id_nhan_vien'=>$ma_nv]);
        $hon_nhan = new TTHonNhanModel(['id_nhan_vien'=>$ma_nv]);
        $hop_dong = new TTHopDongModel(['id_nhan_vien'=>$ma_nv]);
        $phan_quyen = new PhanQuyenModel((['id_tai_khoan'=>$ma_nv,'id_quyen'=>7]));
        $nhan_vien->save();
        $phan_quyen->save();
        $tai_khoan->save();
        $hon_nhan->save();
        $dan_su->save();
        $lien_he->save();
        $bang_cap->save();
        $hop_dong->save();
        return redirect()->route('ql_nv');
    }
    public function xlSua(Request $request){
        $nhan_vien = NhanVienModel::find($request->id);
        $nhan_vien->ho_ten = $request->ho_ten;
        $nhan_vien->gioi_tinh = $request->gioi_tinh;
        $nhan_vien->noi_sinh = $request->noi_sinh;
        $nhan_vien->ngay_sinh = $request->ngay_sinh;
        $nhan_vien->ngay_vao_lam = $request->ngay_vao_lam;
        // $nhan_vien->ngay_nghi_viec = $request->ngay_nghi_viec;
        $nhan_vien->cmnd = $request->cmnd;
        $nhan_vien->ngay_cap = $request->ngay_cap;
        $nhan_vien->noi_cap = $request->noi_cap;
        $nhan_vien->quoc_tich = $request->quoc_tich;
        $nhan_vien->dan_toc = $request->dan_toc;
        $nhan_vien->ton_giao = $request->ton_giao;
        $nhan_vien->id_chuc_vu = $request->chuc_vu;
        $nhan_vien->save();
        return redirect()->route('ql_nv');
    }
    public function xlTTDS(Request $request){
        $dan_su = TTDanSuModel::where('id_nhan_vien',$request->id)->first();
        if(empty($dan_su)){
            $dan_su = new TTDanSuModel();
            $dan_su->id_nhan_vien = $request->id;
        }
        $dan_su->so_bhxh = $request->so_bhxh;
        $dan_su->thang_tham_gia_bhxh = $request->thang_tham_gia_bhxh;
        $dan_su->ma_so_thue = $request->ma_so_thue;
        $dan_su->thuong_tru = $request->thuong_tru;
        $dan_su->tam_tru = $request->tam_tru;
        $dan_su->khai_sinh = $request->khai_sinh;
        $dan_su->save();
        return redirect()->route('ql_nv');
    }
    public function xlTTLH(Request $request){
        $lien_he = TTLienHeModel::where('id_nhan_vien',$request->id)->first();
        if(empty($lien_he)){
            $lien_he = new TTLienHeModel();
            $lien_he->id_nhan_vien = $request->id;
        }
        $lien_he->sdt_rieng = $request->sdt_rieng;
        $lien_he->sdt_noi_bo = $request->sdt_noi_bo;
        $lien_he->email_rieng = $request->email_rieng;
        $lien_he->email_noi_bo = $request->email_noi_bo;
        $lien_he->save();
        return redirect()->route('ql_nv');
    }
    public function xlTTHN(Request $request){
        $hon_nhan = TTHonNhanModel::where('id_nhan_vien',$request->id)->first();
        if(empty($hon_nhan)){
            $hon_nhan = new TTHonNhanModel();
            $hon_nhan->id_nhan_vien = $request->id;
        }
        $hon_nhan->so_con = $request->so_con;
        $hon_nhan->tinh_trang_hon_nhan = $request->tinh_trang_hon_nhan;
        $hon_nhan->save();
        return redirect()->route('ql_nv');
    }
    public function xlTTBC(Request $request){
        $bang_cap = TTBangCapModel::where('id_nhan_vien',$request->id)->first();
        if(empty($bang_cap)){
            $bang_cap = new TTBangCapModel();
            $bang_cap->id_nhan_vien = $request->id;
        }
        $bang_cap->id_chuyen_nganh = $request->id_chuyen_nganh;
        $bang_cap->trinh_do_hoc_van = $request->trinh_do_hoc_van;
        $bang_cap->trinh_do_chuyen_mon = $request->trinh_do_chuyen_mon;
        $bang_cap->trinh_do_chinh = $request->trinh_do_chinh;
        $bang_cap->truong_dao_tao = $request->truong_dao_tao;
        $bang_cap->xep_loai = $request->xep_loai;
        $bang_cap->hinh_thuc_dao_tao = $request->hinh_thuc_dao_tao;
        $bang_cap->nam_tot_nghiep = $request->nam_tot_nghiep;
        $bang_cap->chung_chi = $request->chung_chi;
        $bang_cap->montessori = $request->montessori;
        $bang_cap->save();
        return redirect()->route('ql_nv');
    }
    public function xlTTHD(Request $request){
        $hop_dong = TTHopDongModel::where('id_nhan_vien',$request->id)->first();
        if(empty($hop_dong)){
            $hop_dong = new TTHopDongModel();
            $hop_dong->id_nhan_vien = $request->id;
        }
        $hop_dong->loai_hd = $request->loai_hd;
        $hop_dong->so_hd = $request->so_hd;
        $hop_dong->ngay_ky = $request->ngay_ky;
        $hop_dong->ngay_ket_thuc = $request->ngay_ket_thuc;
        $hop_dong->save();
        return redirect()->route('ql_nv');
    }
    public function import(Request $request){
        Excel::import(new NhanVienImport, $request->file('file'));
        
        return redirect()->route('ql_nv');
    }
    public function export(Request $request){
        $query = NhanVienModel::query()->select ('ql_nhanvien.id',
            'ql_nhanvien.ho_ten','ql_nhanvien.gioi_tinh','ql_nhanvien.noi_sinh','ql_nhanvien.ngay_sinh','ql_nhanvien.ngay_vao_lam','ql_nhanvien.ngay_nghi_viec','dm_chucvu.ten_chuc_vu as chuc_vu','ql_nhanvien.cmnd','ql_nhanvien.ngay_cap','ql_nhanvien.noi_cap','ql_nhanvien.quoc_tich','ql_nhanvien.dan_toc','ql_nhanvien.ton_giao',
            'tt_lienhe.sdt_rieng','tt_lienhe.sdt_noi_bo','tt_lienhe.email_rieng','tt_lienhe.email_noi_bo',
            'tt_honnhan.tinh_trang_hon_nhan','tt_honnhan.so_con',
            'tt_dansu.so_bhxh','tt_dansu.thang_tham_gia_bhxh','tt_dansu.ma_so_thue','tt_dansu.thuong_tru','tt_dansu.tam_tru','tt_dansu.khai_sinh',
            'dm_chuyennganh.ten_chuyen_nganh as chuyen_nganh',
            'tt_bangcap.trinh_do_hoc_van',
            'tt_bangcap.trinh_do_chuyen_mon',
            'tt_bangcap.trinh_do_chinh',
            'tt_bangcap.truong_dao_tao',
            'tt_bangcap.xep_loai',
            'tt_bangcap.hinh_thuc_dao_tao',
            'tt_bangcap.nam_tot_nghiep',
            'tt_bangcap.chung_chi',
            'tt_bangcap.montessori',
            'tt_hopdong.loai_hd',
            'tt_hopdong.so_hd',
            'tt_hopdong.ngay_ky',
            'tt_hopdong.ngay_ket_thuc')
        ->leftJoin('dm_chucvu','ql_nhanvien.id_chuc_vu','=','dm_chucvu.id')
        ->leftJoin('tt_honnhan','ql_nhanvien.id','=','tt_honnhan.id_nhan_vien')
        ->leftJoin('tt_lienhe','ql_nhanvien.id','=','tt_lienhe.id_nhan_vien')
        ->leftJoin('tt_bangcap','ql_nhanvien.id','=','tt_bangcap.id_nhan_vien')
        ->leftJoin('tt_dansu','ql_nhanvien.id','=','tt_dansu.id_nhan_vien')
        ->leftJoin('tt_hopdong',function($join) {
            $join->on('ql_nhanvien.id','=','tt_hopdong.id_nhan_vien')
             ->whereRaw('NOW() BETWEEN tt_hopdong.ngay_ky AND tt_hopdong.ngay_ket_thuc');
            })
        ->leftJoin('dm_chuyennganh','tt_bangcap.id_chuyen_nganh','=','dm_chuyennganh.id');
        if ($request->has('tk_ho_ten') && !empty($request->tk_ho_ten)){
            $query->where('ho_ten','like','%'.$request->tk_ho_ten.'%');
        }
        if ($request->has('tk_chuc_vu')&& !empty($request->tk_chuc_vu)){
            $query->where('id_chuc_vu',$request->tk_chuc_vu);
        }
        if ($request->has('tk_gioi_tinh')&& !empty($request->tk_gioi_tinh)){
            $query->where('gioi_tinh','like','%'.$request->tk_gioi_tinh.'%');
        }
        if ($request->has('tk_noi_sinh')&& !empty($request->tk_noi_sinh)){
            $query->where('noi_sinh',$request->tk_noi_sinh);
        }
        if ($request->has('tk_trang_thai')&& !empty($request->tk_trang_thai)){
            if($request->tk_trang_thai == 'active'){
                $query->whereNull('ngay_nghi_viec');
            }
            else if($request->tk_trang_thai == 'inactive'){
                $query->whereNotNull('ngay_nghi_viec');
            }
        }
        $query = $query->get();

        
        return Excel::download(new NhanVienExport($query), 'export_nv.xlsx');
    }
}
