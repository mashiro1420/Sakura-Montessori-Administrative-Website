<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuyenModel;
use App\Models\TaiKhoanModel;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data=[];
        $data['quyen'] = 
        $query = TaiKhoanModel::query()->select('*');
        if($request->has('tk_tai_khoan')&& !empty($request->tk_tai_khoan)){
            $query = $query->where('tai_khoan', 'like', '%'.$request->tai_khoan.'%');
        }
        if($request->quyen != null){
            $query = $query->where('id_quyen', '=', $request->quyen);
        }
        $data['tai_khoans'] = $query->get();
        $data['quyens'] = QuyenModel::all();
        return view('Quan_ly_tai_khoan.quan_ly_tai_khoan',$data);
    }
    public function viewCaiDat(Request $request)
    {
        $data=[];
        $data['tai_khoan'] = TaiKhoanModel::find($request->tai_khoan);
        session()->put('bao_loi', '');
        return view('Quan_ly_tai_khoan.cai_dat_tai_khoan',$data);
    }
//---------------------------------------
    public function xlDoiMK(Request $request){
        $tai_khoan = TaiKhoanModel::find($request->tai_khoan);
        $mat_khau = md5($request->mat_khau);
        if($tai_khoan->mat_khau != $mat_khau){
            session()->flash('bao_loi', 'Mật khẩu không đúng');
            return redirect()->route('cai_dat_tk',['tai_khoan'=>$request->tai_khoan]);
        }
        $mat_khau_moi = $request->mat_khau_moi;
        $xac_nhan = $request->xac_nhan;
        if($mat_khau_moi != $xac_nhan){
            session()->flash('bao_loi', 'Mật khẩu xác nhận không giống với mật khẩu mới');
            return redirect()->route('cai_dat_tk',['tai_khoan'=>$request->tai_khoan]);
        }
        $tai_khoan->mat_khau = md5($mat_khau_moi);
        $tai_khoan->save();
        session()->flash('bao_loi', 'Cập nhật mật khẩu thành công');
        return redirect()->route('cai_dat_tk',['tai_khoan'=>$request->tai_khoan]);
        
    }
    public function xlPhanQuyen(Request $request){
        $tai_khoan = TaiKhoanModel::find($request->tai_khoan);
        $tai_khoan->id_quyen = $request->quyen;
        $tai_khoan->save();
        session()->flash('bao_loi', 'Cập nhật quyền thành công');
        return redirect()->route('ql_tk');
    }
}
