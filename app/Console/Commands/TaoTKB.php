<?php

namespace App\Console\Commands;

use App\Models\KyModel;
use App\Models\PhanLopModel;
use App\Models\ThoiKhoaBieuModel;
use App\Models\TuanModel;
use Illuminate\Console\Command;

class TaoTKB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tao-tkb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ngay = date('Y-m-d');
        $tuan = TuanModel::where('tu_ngay','<=',$ngay)->where('den_ngay','>=',$ngay)->first();
        $ky = KyModel::where('tu_ngay','<=',$ngay)->where('den_ngay','>=',$ngay)->first();
        $phan_lops = PhanLopModel::where('id_ky',$ky->id)->get();
        foreach($phan_lops as $phan_lop){
            $tkb = new ThoiKhoaBieuModel();
            $tkb->id_phan_lop = $phan_lop->id;
            $tkb->id_tuan = $tuan->id+1;
            try{
                $tkb->saveOrFail();
            }catch(\Exception $e){
                continue;
            }
        }
        $tkb_cus = ThoiKhoaBieuModel::where('id_tuan','<=',$tuan->id)->get();
        foreach($tkb_cus as $tkb_cu){
            $tkb_cu->trang_thai = 2;
            $tkb_cu->save();
        }
    }
}
