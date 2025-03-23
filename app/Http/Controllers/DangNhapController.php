<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoanModel;

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
    $tai_khoans = TaiKhoanModel::where('tai_khoan', $tai_khoan);
    session()->put('bao_loi', '');
    session()->put('trang_thai', 200);
    if ($tai_khoans->count() == 0) {
      session()->put('bao_loi', 'Tài khoản không tồn tại');
      session()->put('trang_thai', 422);
    } else {
        if($tai_khoans->where('la_khach', '=', 1)->count() == 0) {
            session()->put('bao_loi', 'Tài khoản bị khóa');
            session()->put('trang_thai', 422);
        }
        else{
            $nguoi_dung = $tai_khoans->first();
            if ($nguoi_dung->mat_khau != $mat_khau) {
                session()->put('bao_loi', 'Sai mật khẩu!');
                session()->put('trang_thai', 401);
            
            }
        }
    }
    if (session('trang_thai') == 200) {
      return response()->json([
        'login' => 'true',
        'quyen' =>session('quyen'),
        'nguoi_dung' => session('nguoi_dung'),
        'token' => session()->getId(),
    ],session('trang_thai'));
    } else {
      return response()->json([
        'error' => session('bao_loi'),
        'login' => 'false'
      ],session('trang_thai'));
    }
  }
}
