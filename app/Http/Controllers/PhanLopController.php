<?php

namespace App\Http\Controllers;

use App\Models\PhanLopModel;
use Illuminate\Http\Request;

class PhanLopController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data = [];
        $query = PhanLopModel::query()->select ('*')
            ->leftJoin('ql_nhanvien as ql_gv_cn','ql_phanlop.id_gv_cn','=','ql_gv_cn.id')
            ->leftJoin('ql_nhanvien as ql_gv_nuoc_ngoai','ql_phanlop.id_gv_nuoc_ngoai','=','ql_gv_nuoc_ngoai.id')
            ->leftJoin('ql_nhanvien as ql_gv_viet','ql_phanlop.id_gv_viet','=','ql_gv_viet.id')
            ->leftJoin('dm_phonghoc','ql_phanlop.id_phong_hoc','=','ql_phonghoc.id')
            ->leftJoin('dm_lop','ql_phanlop.id_lop','=','dm_nhanvien.id')
            ->leftJoin('dm_khoi','ql_phanlop.id_khoi','=','dm_khoi.id')
            ->leftJoin('dm_hedaotao','ql_phanlop.id_he_dao_tao','=','dm_hedaotao.id')
            ->leftJoin('dm_khoahoc','ql_phanlop.id_khoa_hoc','=','dm_khoahoc.id')
            ->leftJoin('tt_ky','ql_phanlop.id_ky','=','tt_ky.id');
        // if ($request->has('tk_ho_ten') && !empty($request->tk_ho_ten)){
        //     $query->where('ho_ten','like','%'.$request->tk_ho_ten.'%');
        //     $data['tk_ho_ten'] = $request->tk_ho_ten;
        // }
        $data['phan_lops'] = $query->orderBy('id')->get();
        return view('Quan_ly_phan_lop.quan_ly_phan_lop', $data);
    }

    
}
