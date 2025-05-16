<?php

namespace App\Http\Controllers;

use App\Models\ThoiKhoaBieuModel;
use App\Models\TKBNgayModel;
use App\Models\TuanModel;
use App\Models\PhanLopModel;
use App\Models\MonHocModel;

use Illuminate\Http\Request;

class GiangDayController extends Controller
{
    public function viewQuanLyTKB(Request $request){
        $data = [];
        $data['tkbs'] = ThoiKhoaBieuModel::select('*','ql_thoikhoabieu.id as id')
        ->leftJoin('tt_tuan', 'ql_thoikhoabieu.id_tuan', '=', 'tt_tuan.id')
        ->leftJoin('ql_phanlop', 'ql_thoikhoabieu.id_phan_lop', '=', 'ql_phanlop.id')
        ->leftJoin('tt_ky','ql_phanlop.id_ky','=','tt_ky.id')
        ->leftJoin('dm_lop','ql_phanlop.id_lop','=','dm_lop.id')
        ->orderBy('id_tuan', 'desc')->orderBy('id_lop')->get();
        // dd($data['tkbs']);
        $data['tuans'] = TuanModel::all();
        $data['phan_lops'] = PhanLopModel::all();
        return view("Quan_ly_tkb.quan_ly_tkb",$data);
    }
    public function viewChinhTKB(Request $request){
        $data = [];
        $data['tkb'] = ThoiKhoaBieuModel::select('*','ql_thoikhoabieu.id as id','tt_tuan.tu_ngay as tkb_tu_ngay')
        ->leftJoin('ql_phanlop', 'ql_thoikhoabieu.id_phan_lop', '=', 'ql_phanlop.id')
        ->leftJoin('tt_tuan', 'ql_thoikhoabieu.id_tuan', '=', 'tt_tuan.id')
        ->leftJoin('dm_lop', 'ql_phanlop.id_lop', '=', 'dm_lop.id')
        ->leftJoin('tt_ky','ql_phanlop.id_ky','=','tt_ky.id')
        ->find($request->id);
        $data['tkb_ngays'] = TKBNgayModel::where('id_thoi_khoa_bieu',$request->id)->get();
        $data['mon_hocs'] = MonHocModel::all();
        return view("Quan_ly_tkb.them_tkb",$data);
    }
    public function viewXemTKB(Request $request){
        $data = [];
        $data['tkb'] = ThoiKhoaBieuModel::select('*','ql_thoikhoabieu.id as id','tt_tuan.tu_ngay as tkb_tu_ngay')
        ->leftJoin('ql_phanlop', 'ql_thoikhoabieu.id_phan_lop', '=', 'ql_phanlop.id')
        ->leftJoin('tt_tuan', 'ql_thoikhoabieu.id_tuan', '=', 'tt_tuan.id')
        ->leftJoin('dm_lop', 'ql_phanlop.id_lop', '=', 'dm_lop.id')
        ->leftJoin('tt_ky','ql_phanlop.id_ky','=','tt_ky.id')
        ->find($request->id);
        $data['tkb_ngays'] = TKBNgayModel::where('id_thoi_khoa_bieu',$request->id)->get();
        $data['mon_hocs'] = MonHocModel::all();
        $tkb_data = [
            1 => ['t2' => 'Toán', 't3' => 'Văn', 't4' => 'Anh', 't5' => 'Lý', 't6' => 'Hóa'],
            2 => ['t2' => 'Sử', 't3' => 'Văn', 't4' => 'Anh', 't5' => 'Lý', 't6' => 'Hóa'],
        ];
        return view("Quan_ly_tkb.xem_tkb_qua_khu", $tkb_data,$data);
    }
    public function xlTKB(Request $request)
    {
        $tkb_cus = TKBNgayModel::where('id_thoi_khoa_bieu',$request->id)->get();
        $tkb = ThoiKhoaBieuModel::find($request->id);
        $tkb->trang_thai = 1;
        $tkb->save();
        foreach($tkb_cus as $tkb_cu){
            $tkb_cu->delete();
        }
        for ($i = 2; $i <= 6;$i++){
            $tkb_ngay = new TKBNgayModel();
            $tkb_ngay->thu = $i;
            $tkb_ngay->id_thoi_khoa_bieu = $request->id;
            switch ($i){
                case 2:
                    $tkb_ngay->tiet1 = $request->tiet1t2;
                    $tkb_ngay->tiet2 = $request->tiet2t2;
                    $tkb_ngay->tiet3 = $request->tiet3t2;
                    $tkb_ngay->tiet4 = $request->tiet4t2;
                    $tkb_ngay->tiet5 = $request->tiet5t2;
                    $tkb_ngay->tiet6 = $request->tiet6t2;
                    $tkb_ngay->tiet7 = $request->tiet7t2;
                    $tkb_ngay->tiet8 = $request->tiet8t2;
                    $tkb_ngay->tiet9 = $request->tiet9t2;
                    $tkb_ngay->tiet10 = $request->tiet10t2;
                    $tkb_ngay->tiet11 = $request->tiet11t2;
                    break;
                case 3:
                    $tkb_ngay->tiet1 = $request->tiet1t3;
                    $tkb_ngay->tiet2 = $request->tiet2t3;
                    $tkb_ngay->tiet3 = $request->tiet3t3;
                    $tkb_ngay->tiet4 = $request->tiet4t3;
                    $tkb_ngay->tiet5 = $request->tiet5t3;
                    $tkb_ngay->tiet6 = $request->tiet6t3;
                    $tkb_ngay->tiet7 = $request->tiet7t3;
                    $tkb_ngay->tiet8 = $request->tiet8t3;
                    $tkb_ngay->tiet9 = $request->tiet9t3;
                    $tkb_ngay->tiet10 = $request->tiet10t3;
                    $tkb_ngay->tiet11 = $request->tiet11t3;
                    break;
                case 4:
                    $tkb_ngay->tiet1 = $request->tiet1t4;
                    $tkb_ngay->tiet2 = $request->tiet2t4;
                    $tkb_ngay->tiet3 = $request->tiet3t4;
                    $tkb_ngay->tiet4 = $request->tiet4t4;
                    $tkb_ngay->tiet5 = $request->tiet5t4;
                    $tkb_ngay->tiet6 = $request->tiet6t4;
                    $tkb_ngay->tiet7 = $request->tiet7t4;
                    $tkb_ngay->tiet8 = $request->tiet8t4;
                    $tkb_ngay->tiet9 = $request->tiet9t4;
                    $tkb_ngay->tiet10 = $request->tiet10t4;
                    $tkb_ngay->tiet11 = $request->tiet11t4;
                    break;
                case 5:
                    $tkb_ngay->tiet1 = $request->tiet1t5;
                    $tkb_ngay->tiet2 = $request->tiet2t5;
                    $tkb_ngay->tiet3 = $request->tiet3t5;
                    $tkb_ngay->tiet4 = $request->tiet4t5;
                    $tkb_ngay->tiet5 = $request->tiet5t5;
                    $tkb_ngay->tiet6 = $request->tiet6t5;
                    $tkb_ngay->tiet7 = $request->tiet7t5;
                    $tkb_ngay->tiet8 = $request->tiet8t5;
                    $tkb_ngay->tiet9 = $request->tiet9t5;
                    $tkb_ngay->tiet10 = $request->tiet10t5;
                    $tkb_ngay->tiet11 = $request->tiet11t5;
                    break;
                case 6:
                    $tkb_ngay->tiet1 = $request->tiet1t6;
                    $tkb_ngay->tiet2 = $request->tiet2t6;
                    $tkb_ngay->tiet3 = $request->tiet3t6;
                    $tkb_ngay->tiet4 = $request->tiet4t6;
                    $tkb_ngay->tiet5 = $request->tiet5t6;
                    $tkb_ngay->tiet6 = $request->tiet6t6;
                    $tkb_ngay->tiet7 = $request->tiet7t6;
                    $tkb_ngay->tiet8 = $request->tiet8t6;
                    $tkb_ngay->tiet9 = $request->tiet9t6;
                    $tkb_ngay->tiet10 = $request->tiet10t6;
                    $tkb_ngay->tiet11 = $request->tiet11t6;
                    break;
                default:
                    break;
            }
            $tkb_ngay->save();
        }
         return redirect()->route('ql_tkb')->with('bao_loi','Lưu thành công');
    }
    public function viewPhuHuynhTKB(Request $request)
    {
        $data = [];
        $data['tuans'] = TuanModel::all();
        return view("Phu_huynh_tkb.phu_huynh_tkb", $data);
    }
}
