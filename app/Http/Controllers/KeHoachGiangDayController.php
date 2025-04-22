<?php

namespace App\Http\Controllers;

use App\Models\KyModel;
use Illuminate\Http\Request;

class KeHoachGiangDayController extends Controller
{
    public function viewKeHoach(){
        $date = date("Y-m-d");
        $data['ky'] = KyModel::whereBetweenColumns($date, ['start_date', 'end_date']);
        return view("",$data);
    }

    public function viewThem(Request $request){
        
    }

}
