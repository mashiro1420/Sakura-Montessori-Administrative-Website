<?php

namespace App\Console\Commands;

use App\Models\DiemDanhModel;
use App\Models\HocSinhModel;
use Illuminate\Console\Command;

class TaoDiemDanhCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tao-diem-danh-command';

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
        $hoc_sinhs = HocSinhModel::where('trang_thai',1)->get();
        foreach ($hoc_sinhs as $hoc_sinh) {
            $diem_danh = new DiemDanhModel();
            $diem_danh->id_hoc_sinh = $hoc_sinh->id;
            $diem_danh->ngay = date('Y-m-d');
            $diem_danh->trang_thai = 0;
            $diem_danh->save();
        }
    }
}
