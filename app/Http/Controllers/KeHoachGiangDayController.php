<?php

namespace App\Http\Controllers;

use App\Models\KyModel;
use Illuminate\Http\Request;

class KeHoachGiangDayController extends Controller
{
    public function viewQuanLyTaiLieuGiangDay(){
        $date = date("Y-m-d");
        $data['ky'] = KyModel::whereBetweenColumns($date, ['start_date', 'end_date']);
        return view("Quan_ly_tai_lieu_giang_day/quan_ly_tai_lieu_giang_day",$data);
    }

    public function viewThem(Request $request){
        
    }

}
