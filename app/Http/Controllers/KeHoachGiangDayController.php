<?php

namespace App\Http\Controllers;

use App\Models\GiangDayModel;
use App\Models\KyModel;
use App\Models\TuanModel;
use App\Models\LopModel;
use App\Models\PhanLopModel;
use App\Models\TTGiangDayModel;
use Illuminate\Http\Request;

class KeHoachGiangDayController extends Controller
{
    public function viewQuanLyTaiLieuGiangDay(){
        $date = date("Y-m-d");
        $query = TTGiangDayModel::query()->select('*')
        ->leftJoin('ql_giangday','ql_giangday.id','=','tt_giangday.id_giang_day')
        ->leftJoin('tt_tuan','tt_tuan.id','=','ql_giangday.id_tuan')
        ->leftJoin('ql_phanlop','ql_phanlop.id','=','ql_giangday.id_phan_lop')
        ->leftJoin('tt_ky','tt_ky.id','=','ql_phanlop.id_ky')
        ->leftJoin('dm_lop','dm_lop.id','=','ql_phanlop.id_lop');
        $data['tl_giang_days'] = $query->orderBy('ql_giangday.id')->get();
        // dd($data['tl_giang_days'] );
        $data['ky_hien_tai'] = KyModel::where('tu_ngay','<=',$date)->where('den_ngay','>=',$date)->first();
        $data['kys']= KyModel::all();
        $data['tuans'] = TuanModel::all();
        $data['lops'] = LopModel::all();
        return view("Quan_ly_tai_lieu_giang_day.quan_ly_tai_lieu_giang_day",$data);
    }
    public function viewThemTaiLieuGiangDay(Request $request){
        $date = date("Y-m-d");
        $data['ky_hien_tai'] = KyModel::where('tu_ngay','<=',$date)->where('den_ngay','>=',$date)->first();
        $data['tuans'] = TuanModel::where('tu_ngay','>=',$data['ky_hien_tai']->tu_ngay)->where('den_ngay','<=',$data['ky_hien_tai']->den_ngay)->get();
        $data['lops'] = PhanLopModel::select('*','ql_phanlop.id as id')
        ->leftJoin('dm_lop','dm_lop.id','=','ql_phanlop.id_lop')
        ->leftJoin('tt_ky','tt_ky.id','=','ql_phanlop.id_ky')
        ->where('id_ky',$data['ky_hien_tai']->id)->get();
        return view("Quan_ly_tai_lieu_giang_day.them_tai_lieu_giang_day",$data);
    }
    public function viewSuaTaiLieuGiangDay(Request $request){
        $data['kys']= KyModel::all();
        $data['tuans'] = TuanModel::all();
        $data['lops'] = LopModel::all();
        return view("Quan_ly_tai_lieu_giang_day.sua_tai_lieu_giang_day",$data);
    }
    public function xlThemTaiLieuGiangDay(Request $request){ 
        $giang_day = GiangDayModel::where('id_phan_lop',$request->lop)->where('id_tuan',$request->tuan)->first();
        if(empty($giang_day)){
            $giang_day_moi = new GiangDayModel();
            $giang_day_moi->id_phan_lop = $request->lop;
            $giang_day_moi->id_tuan = $request->tuan;
            $giang_day_moi->save();
            $giang_day = GiangDayModel::where('id_phan_lop',$request->lop)->where('id_tuan',$request->tuan)->first();
        } 
        $tai_lieu = new TTGiangDayModel();
        $tai_lieu->id_giang_day = $giang_day->id;
        $tai_lieu->mo_ta = $request->mo_ta;
        if ($request->hasFile('file')) {
            $file = $request->file;
            $filename = md5(time().rand(1,100) . $request->file->getClientOriginalName()) . '.' . $request->file->getClientOriginalExtension();
            $file->move('Giao_an', $filename);
            $tai_lieu->link_giao_an = $filename;
        }
        $tai_lieu->save();
        return redirect()->route('ql_tlgd')->with('success', 'Thêm tài liệu thành công');
    }   
}
