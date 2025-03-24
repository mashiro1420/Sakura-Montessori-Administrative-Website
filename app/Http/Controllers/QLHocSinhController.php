<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QLHocSinhController extends Controller
{
    public function viewQuanLy()
    {
        $data=[];
        $data['bao_loi'] = session('bao_loi');
		session()->put('bao_loi', '');
        return view('Quan_ly_hoc_sinh.quan_ly_hoc_sinh',$data);//
    }
    public function viewThem()
    {
        $data=[];
        $data['bao_loi'] = session('bao_loi');
		session()->put('bao_loi', '');
        return view('Quan_ly_hoc_sinh.quan_ly_hoc_sinh',$data);//
    }
    public function viewSua()
    {
        $data=[];
        $data['bao_loi'] = session('bao_loi');
		session()->put('bao_loi', '');
        return view('Quan_ly_hoc_sinh.quan_ly_hoc_sinh',$data);//
    }
    public function viewDanSu()
    {
        $data=[];
        $data['bao_loi'] = session('bao_loi');
		session()->put('bao_loi', '');
        return view('Quan_ly_hoc_sinh.quan_ly_hoc_sinh',$data);//
    }
}
