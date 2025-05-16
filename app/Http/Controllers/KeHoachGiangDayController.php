<?php

namespace App\Http\Controllers;

use App\Models\KyModel;
use App\Models\TuanModel;
use App\Models\LopModel;
use App\Models\TTGiangDayModel;
use Illuminate\Http\Request;

class KeHoachGiangDayController extends Controller
{
    public function viewQuanLyTaiLieuGiangDay(){
        $date = date("Y-m-d");
        $data['tl_giang_days'] = TTGiangDayModel::all();
        $data['ky'] = KyModel::whereBetweenColumns($date, ['start_date', 'end_date']);
        $data['kys']= KyModel::all();
        $data['tuans'] = TuanModel::all();
        $data['lops'] = LopModel::all();
        return view("Quan_ly_tai_lieu_giang_day/quan_ly_tai_lieu_giang_day",$data);
    }

    public function viewThem(Request $request){
        
    }

}
