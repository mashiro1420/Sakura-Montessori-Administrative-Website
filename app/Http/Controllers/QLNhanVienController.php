<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChucVuModel;
use App\Models\NhanVienModel;
use App\Models\TaiKhoanModel;
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
            $query->where('trang_thai',$request->tk_trang_thai);
            $data['tk_tham_nien'] = $request->tk_tham_nien;
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

}
