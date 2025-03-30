<?php

namespace App\Exports;

use App\Models\TaiKhoanModel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TaiKhoanExport implements FromCollection, WithHeadings
{
    use Exportable;
    protected $tai_khoans;
    public function __construct($tai_khoans)
    {
        $this->tai_khoans = $tai_khoans;
        
    }
    public function collection()
    {
        return collect($this->tai_khoans)->map(function ($tai_khoans, $index) {
            return [
                'STT' => $index + 1,
                'Tài khoản' => $tai_khoans->tai_khoan,
                'Mã nhân viên' => $tai_khoans->id_nhan_vien,
                'Mã học sinh' => $tai_khoans->id_hoc_sinh,
                'Quyền' => $tai_khoans->ten_quyen,
            ];
        });
    }
    public function headings(): array
    {
        return ['STT',
        'Tài khoản',
        'Mã nhân viên',
        'Mã học sinh',
        'Quyền'];
    }
}
