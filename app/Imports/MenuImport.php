<?php

namespace App\Imports;

use App\Models\ThucDonModel;
use App\Models\TuanModel;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MenuImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $so_tuan = $rows[0][1];
        $tuan = TuanModel::where('tuan', $so_tuan)->first();
        $thu = 2;
        for ($thu;$thu<=6;$thu++) {
            $menu = ThucDonModel::where('id_tuan', $tuan->id)->where('thu', $thu)->first();
            $menu->sang1 = $rows[2][$thu];
            $menu->sang2 = $rows[3][$thu];
            $menu->chinh = $rows[4][$thu];
            $menu->rau = $rows[5][$thu];
            $menu->canh = $rows[6][$thu];
            $menu->com = $rows[7][$thu];
            $menu->chao = $rows[8][$thu];
            $menu->chieu1 = $rows[9][$thu];
            $menu->chieu2 = $rows[10][$thu];
            $menu->nhe = $rows[11][$thu];
            $menu->save();
        }
    }  
}
