<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DichVuModel;
use App\Models\BangGiaModel;

class DichVuController extends Controller
{
    public function viewQuanLyBangGia(Request $request)
    {
        $data = [];
        $data['bang_gias'] = BangGiaModel::all();
        $data['dich_vus'] = DichVuModel::all();
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
}
