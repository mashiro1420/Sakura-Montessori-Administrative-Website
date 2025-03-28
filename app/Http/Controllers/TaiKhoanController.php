<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuyenModel;
use App\Models\TaiKhoanModel;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    /**
     * The function `viewQuanLy` retrieves and filters data from the database based on the request
     * parameters and then returns a view with the filtered data.
     * 
     * @param Request request The `viewQuanLy` function is a controller method that retrieves data from
     * the database based on the request parameters and then passes that data to a view for rendering.
     * 
     * @return The function `viewQuanLy` is returning a view named
     * 'Quan_ly_tai_khoan.quan_ly_tai_khoan' with the data array ``, which contains the following
     * keys:
     * - 'quyen': This key is currently empty and not assigned any value.
     * - 'tai_khoans': This key contains the result of the query executed on the `
     */
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
    public function xlQuyen(Request $request)
    {
        // Lấy tài khoản và quyền mới
        $tai_khoan = TaiKhoanModel::where('tai_khoan', $request->tai_khoan)->first();

        if ($tai_khoan) {
            // Cập nhật quyền cho tài khoản
            $tai_khoan->id_quyen = $request->id_quyen;
            $tai_khoan->save();

            // Truyền thông báo thành công qua session và redirect về trang danh sách
            return redirect()->route('ql_tk')->with('success', 'Cập nhật quyền thành công');
        }

        // Nếu không tìm thấy tài khoản, redirect về trang danh sách và thông báo lỗi
        return redirect()->route('ql_tk')->with('error', 'Không tìm thấy tài khoản');
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
