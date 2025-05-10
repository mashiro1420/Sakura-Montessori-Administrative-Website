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
        $di_bus = HocSinhModel::where('trang_thai',1)->where('di_bus',1)->get();
        foreach ($hoc_sinhs as $hoc_sinh) {
            $diem_danh = new DiemDanhModel();
            $diem_danh->id_hoc_sinh = $hoc_sinh->id;
            $diem_danh->ngay = date('Y-m-d');
            $diem_danh->trang_thai = 0;
            $diem_danh->loai_diem_danh = 1;
            $diem_danh->save();
        }
        foreach ($di_bus as $hoc_sinh_di_bus) {
            $diem_danh = new DiemDanhModel();
            $diem_danh->id_hoc_sinh = $hoc_sinh_di_bus->id;
            $diem_danh->ngay = date('Y-m-d');
            $diem_danh->trang_thai = 0;
            $diem_danh->loai_diem_danh = 2;
            $diem_danh->save();
        }
    }
}
