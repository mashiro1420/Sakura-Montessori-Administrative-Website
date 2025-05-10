<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LopExport implements FromCollection, WithHeadings
{
    use Exportable;
    protected $hoc_sinhs;
    public function __construct($hoc_sinhs)
    {
        $this->hoc_sinhs = $hoc_sinhs;
        
    }
    public function collection()
    {
        return collect($this->hoc_sinhs)->map(function ($hoc_sinhs, $index) {
            return [
                'STT' => $index + 1,
                'Mã học sinh' => $hoc_sinhs->hoc_sinh_id,
                'Họ tên' => $hoc_sinhs->ho_ten,
            ];
        });
    }
    public function headings(): array
    {
        return ['STT',
        'Mã',
        'Họ tên',];
    }
}
