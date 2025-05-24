<?php

namespace App\Console\Commands;

use App\Models\BangGiaModel;
use App\Models\HocPhiModel;
use App\Models\HocSinhModel;
use App\Models\PhanLopModel;
use App\Models\TTDichVuHocSinhModel;
use App\Models\TTDiXeModel;
use Illuminate\Console\Command;

class TinhHocPhiThang extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tinh-hoc-phi-thang';

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
        $hoc_sinhs = HocSinhModel::where('trang_thai', 1)->where('loai_hoc_phi',2)->get();
        foreach ($hoc_sinhs as $hoc_sinh){
            $hoc_phi = new HocPhiModel();
            $hoc_phi->id_hoc_sinh = $hoc_sinh->id;
            $hoc_phi->loai_hoc_phi = 2;
            $tong_dich_vu = 0;
            $tien_nang_khieu = 0;
            $he_dao_tao = PhanLopModel::select('dm_hedaotao.*')
            ->leftJoin('dm_hedaotao','dm_hedaotao.id','=','ql_phanlop.id_he_dao_tao')
            ->where('ql_phanlop.id',$hoc_sinh->id_phan_lop)->first();
            if(empty($he_dao_tao)) continue;
            $tong_hoc_phi = BangGiaModel::where('ten_gia','Học phí 1 tháng hệ '.$he_dao_tao->ten_he_dao_tao.'')->first()->gia;
            $dich_vus = TTDichVuHocSinhModel::where('id_hoc_sinh',$hoc_sinh->id)->get(); 
            if(count($dich_vus)!= 0){
                foreach($dich_vus as $dich_vu){
                    // echo $dich_vu->id_bang_gia;
                    $bang_gia = BangGiaModel::find($dich_vu->id_bang_gia);
                    $tong_dich_vu += $bang_gia->gia;
                }
            }
            if(!empty($hoc_sinh->id_nang_khieu)) $tien_nang_khieu += BangGiaModel::where('id_dich_vu',4)->first()->gia;
            $phi_phat_trien = BangGiaModel::where('ten_gia','Phí phát triển')->first()->gia;
            $tong_so_tien = $phi_phat_trien+$tong_hoc_phi+$tong_dich_vu+$tien_nang_khieu;
            $hoc_phi->tong_so_tien = $tong_so_tien;
            $hoc_phi->phat_trien = $phi_phat_trien;
            $hoc_phi->tong_hoc_phi = $tong_hoc_phi;
            $hoc_phi->tong_dich_vu = $tong_dich_vu;
            $hoc_phi->tien_nang_khieu = $tien_nang_khieu;
            $hoc_phi->save();
        }
    }
}
