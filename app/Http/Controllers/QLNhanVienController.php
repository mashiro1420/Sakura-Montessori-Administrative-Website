<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChucVuModel;
use App\Models\NhanVienModel;
use App\Models\TaiKhoanModel;
use App\Models\TTBangCapModel;
use App\Models\TTDanSuModel;
use App\Models\TTHonNhanModel;
use App\Models\TTLienHeModel;
use Illuminate\Http\Request;

class QLNhanVienController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data=[];
        $data['tim_kiem'] = true;
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
            $query->where('gioi_tinh','like','%'.$request->tk_gioi_tinh.'%');
            $data['tk_gioi_tinh'] = $request->tk_gioi_tinh;
        }
        if ($request->has('tk_noi_sinh')&& !empty($request->tk_noi_sinh)){
            $query->where('noi_sinh',$request->tk_noi_sinh);
            $data['tk_noi_sinh'] = $request->tk_noi_sinh;
        }
        if ($request->has('tk_tham_nien')&& !empty($request->tk_tham_nien)){
            $query->where('tham_nien',$request->tk_tham_nien);
            $data['tk_tham_nien'] = $request->tk_tham_nien;
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
        $data['nhan_viens'] = $query->get();
        $data['chuc_vus'] = ChucVuModel::all();
        return view('Quan_ly_nhan_vien.quan_ly_nhan_vien',$data);
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
    public function viewCapNhatTTDS()
    {
        $data=[];
        // $data['bao_loi'] = session('bao_loi');
		// session()->put('bao_loi', '');
        return view('Quan_ly_nhan_vien.cap_nhat_thong_tin_dan_su',$data);
    }
    public function viewCapNhatTTHN()
    {
        $data=[];
        // $data['bao_loi'] = session('bao_loi');
		// session()->put('bao_loi', '');
        return view('Quan_ly_nhan_vien.cap_nhat_thong_tin_hon_nhan',$data);
    }
    public function viewCapNhatTTLH()
    {
        $data=[];
        // $data['bao_loi'] = session('bao_loi');
		// session()->put('bao_loi', '');
        return view('Quan_ly_nhan_vien.cap_nhat_thong_tin_lien_he',$data);
    }
    public function viewCapNhatTTBC()
    {
        $data=[];
        // $data['bao_loi'] = session('bao_loi');
		// session()->put('bao_loi', '');
        return view('Quan_ly_nhan_vien.cap_nhat_thong_tin_bang_cap',$data);
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
        $tai_khoan->id_quyen = 3;
        $nhan_vien->save();
        $tai_khoan->save();
        return redirect()->route('ql_nv');
    }
    public function xlSua(Request $request){
        $nhan_vien = NhanVienModel::find($request->id);
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
        $nhan_vien->save();
        return redirect()->route('ql_nv');
    }
    public function xlTTDS(Request $request){
        $dan_su = TTDanSuModel::where('id_nhan_vien',$request->id);
        if($dan_su->count() == 0){
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
        $lien_he = TTLienHeModel::where('id_nhan_vien',$request->id);
        if($lien_he->count() == 0){
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
        $hon_nhan = TTHonNhanModel::where('id_nhan_vien',$request->id);
        if($hon_nhan->count() == 0){
            $hon_nhan = new TTLienHeModel();
            $hon_nhan->id_nhan_vien = $request->id;
        }
        $hon_nhan->so_con = $request->so_con;
        $hon_nhan->tinh_trang_hon_nhan = $request->tinh_trang_hon_nhan;
        $hon_nhan->save();
        return redirect()->route('ql_nv');
    }
    public function xlTTBC(Request $request){
        $bang_cap = TTBangCapModel::where('id_nhan_vien',$request->id);
        if($bang_cap->count() == 0){
            $bang_cap = new TTLienHeModel();
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
}
