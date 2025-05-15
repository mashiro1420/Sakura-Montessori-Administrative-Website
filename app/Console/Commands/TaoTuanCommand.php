<?php

namespace App\Console\Commands;

use App\Models\KhoaHocModel;
use App\Models\TuanModel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TaoTuanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tao-tuan-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tạo tuần tự động';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nam = date('Y')+1;
		$tu_ngay = Carbon::create($nam, 1, 1);
		$den_ngay = Carbon::create($nam, 12, 31);
		$tuans = [];

		for ($so_tuan = 1; $so_tuan <= 53; $so_tuan++) {
			$tuan_bat_dau = $tu_ngay->copy()->startOfWeek();
			$tuan_ket_thuc = $tu_ngay->copy()->endOfWeek();

			$tuans[] = [
				'tu_ngay' => $tuan_bat_dau->format('Y-m-d'),
				'den_ngay' => $tuan_ket_thuc->format('Y-m-d'),
					'nam' => $nam,
				'tuan' => $so_tuan,
			];

			$tu_ngay->addWeek();
		}
		TuanModel::insertOrIgnore($tuans);
        $khoa_hoc = new KhoaHocModel();
        $khoa_hoc->ten_khoa_hoc = $nam;
        $khoa_hoc->save();
    }
}
