<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoanModel;
use Illuminate\Support\Facades\Log;

class DangNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=[];
        $data['bao_loi'] = session('bao_loi');
		session()->put('bao_loi', '');
        return view('Dang_nhap.dang_nhap',$data);//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function login(Request $request)
    {
        $tai_khoan = $request->tai_khoan;
        $mat_khau = md5($request->mat_khau);
        $nguoi_dungs = TaiKhoanModel::where('tai_khoan', '=', $tai_khoan);
        session()->put('bao_loi', '');
        if ($nguoi_dungs->count() == 0) {
            $request->session()->put('bao_loi', 'Tài khoản không tồn tại');
            Log::info($request->session()->get('bao_loi'));
        } else {
            $nguoi_dung = $nguoi_dungs->first();
            if ($nguoi_dung->mat_khau != $mat_khau) {
                $request->session()->put('bao_loi', 'Sai mật khẩu');
                Log::info($request->session()->get('bao_loi'));
            } else {
                $request->session()->put('bao_loi', '');
                $request->session()->put('tai_khoan', $tai_khoan);
                if($nguoi_dung->la_khach == 1) {
					$request->session()->put('la_khach', 'true');
                    Log::info($request->session()->get('la_khach'));
				}
				else {
					$request->session()->put('id_quyen', $nguoi_dung->id_quyen);
                    Log::info($request->session()->get('id_quyen'));
				}
            }
        }
        if (session('bao_loi') == '') {
			// if(session('id_quyen') == '') {
				return redirect()->route('dang_nhap');
			// }
			// else{
			// 	return redirect()->route('dang_nhap');
			// }
            
        } else {
            return redirect()->route('dang_nhap');
        }
  }
}
