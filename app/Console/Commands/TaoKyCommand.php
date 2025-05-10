<?php

namespace App\Console\Commands;

use App\Models\KyModel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TaoKyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tao-ky-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tạo kỳ tự động';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nam = date('Y');
        $tu_ngay_ky_1 = Carbon::create($nam, 7, 1);
        $den_ngay_ky_1 = Carbon::create($nam, 12, 31);
        $tu_ngay_ky_2 = Carbon::create($nam+1, 1, 1);
        $den_ngay_ky_2 = Carbon::create($nam+1, 6, 31);
        $ky1[]=[
            'ten_ky'=> 'Kỳ I năm '.$nam.' - '.$nam+1,
            'tu_ngay'=>$tu_ngay_ky_1,
            'den_ngay'=>$den_ngay_ky_1,
            'nam_hoc'=>$nam,
            'ky'=>1
        ];
        $ky2[]=[
            'ten_ky'=> 'Kỳ II năm '.$nam.' - '.$nam+1,
            'tu_ngay'=>$tu_ngay_ky_2,
            'den_ngay'=>$den_ngay_ky_2,
            'nam_hoc'=>$nam+1,
            'ky'=>2
        ];
        KyModel::insertOrIgnore($ky1);
        KyModel::insertOrIgnore($ky2);
    }
}
