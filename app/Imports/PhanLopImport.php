<?php

namespace App\Imports;

use App\Models\HocPhiModel;
use App\Models\HocSinhModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PhanLopImport implements ToCollection
{
    
    protected $id_lop;

    public function __construct($id_lop)
    {
        $this->id_lop = $id_lop;
    }

    public function collection(Collection $collection)
    {
        $hoc_sinh_cu = HocSinhModel::where("id_phan_lop", $this->id_lop)->get();
        foreach ($hoc_sinh_cu as $hoc_sinh){
            $hoc_sinh->id_phan_lop = null;
            $hoc_sinh->save();
        }
        foreach ($collection as $item) {
            $hoc_sinh = HocSinhModel::find($item[1]);
            if (!empty($hoc_sinh)) {
                $hoc_sinh->id_phan_lop = $this->id_lop;
                // dump($hoc_sinh);
                $hoc_sinh->save();
            }
        }
        // dd($this->id_lop);
    }
}
