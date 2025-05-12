<?php

namespace App\Http\Controllers;

use App\Models\ThoiKhoaBieuModel;
use App\Models\TKBNgayModel;
use Illuminate\Http\Request;

class GiangDayController extends Controller
{
    public function xlTKB(Request $request)
    {
        if($request->has("sua")){
            $tkb_cu = TKBNgayModel::where('id_thoi_khoa_bieu',$request->id)->get();
            foreach($tkb_cu as $tkb){
                $tkb->delete();
            }
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
    }
}
