<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoanModel;
use Illuminate\Support\Facades\Log;

class DangNhapController extends Controller
{
    public function viewDangNhap()
    {
        $data=[];
        $data['bao_loi'] = session('bao_loi');
		session()->put('bao_loi', '');
        return view('Dang_nhap.dang_nhap',$data);//
    }
//-----------------------------------------
    public function login(Request $request)
    {
        $tai_khoan = $request->tai_khoan;
        $mat_khau = md5($request->mat_khau);
        $nguoi_dungs = TaiKhoanModel::where('tai_khoan', '=', $tai_khoan);
        session()->put('bao_loi', '');
        if ($nguoi_dungs->count() == 0) {
            $request->session()->put('bao_loi', 'Tài khoản không tồn tại');
        } else {
            $nguoi_dung = $nguoi_dungs->first();
            if ($nguoi_dung->mat_khau != $mat_khau) {
                $request->session()->put('bao_loi', 'Sai mật khẩu');
            } else {
                $request->session()->put('bao_loi', '');
                $request->session()->put('tai_khoan', $tai_khoan);
                if($nguoi_dung->la_khach == 1) {
					$request->session()->put('la_khach', 'true');
				}
				else {
					$request->session()->put('id_quyen', $nguoi_dung->id_quyen);
				}
            }
        }
        if (session('bao_loi') == '') {
			if(session('id_quyen') == '1') {
				return redirect()->route('ql_nv');
			}
            elseif (session('id_quyen') == '3') {
                return redirect()->route('ql_nv');
            }
            elseif (session('id_quyen') == '2') {
                return redirect()->route('ql_nv');
            }
			else{
				return redirect()->route('dang_nhap');
			}
            
        } else {
            return redirect()->route('dang_nhap');
        }
    }
    public function logout(){
        session()->flush();
        return redirect()->route('dang_nhap');
    }
}
