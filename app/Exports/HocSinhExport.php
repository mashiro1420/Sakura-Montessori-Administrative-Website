<?php

namespace App\Exports;

use App\Models\HocSinhModel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HocSinhExport implements FromCollection, WithHeadings
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
                'Mã học sinh' => $hoc_sinhs->id,
                'Họ tên' => $hoc_sinhs->ho_ten,
                'Ngày nhập học' => $hoc_sinhs->ngay_nhap_hoc,
                'Ngày update' => $hoc_sinhs->ngay_update,
                'Trạng thái' => $hoc_sinhs->trang_thai==1?'Đang học':'Đã thôi học',
                'Ngày thôi học' => $hoc_sinhs->ngay_thoi_hoc,
                'Nickname' => $hoc_sinhs->nickname,
                'Giới tính' => $hoc_sinhs->gioi_tinh,
                'Ngày sinh' => $hoc_sinhs->ngay_sinh,
                'Quốc tịch' => $hoc_sinhs->quoc_tich,
                'Ngôn ngữ' => $hoc_sinhs->ngon_ngu,
                'Cân nặng' => $hoc_sinhs->can_nang,
                'Chiều cao' => $hoc_sinhs->chieu_cao,
                'Nơi sinh' => $hoc_sinhs->noi_sinh,
                'Thông tin sức khỏe' => $hoc_sinhs->thong_tin_suc_khoe,
                'Họ tên mẹ' => $hoc_sinhs->ho_ten_me,
                'SĐT mẹ' => $hoc_sinhs->sdt_me,
                'Email mẹ' => $hoc_sinhs->email_me,
                'Nghề nghiệp mẹ' => $hoc_sinhs->nghe_nghiep_me,
                'CMND mẹ' => $hoc_sinhs->cmnd_me,
                'Năm sinh mẹ' => $hoc_sinhs->nam_sinh_me,
                'Quốc tịch mẹ' => $hoc_sinhs->quoc_tich_me,
                'Họ tên bố' => $hoc_sinhs->ho_ten_bo,
                'SĐT bố' => $hoc_sinhs->sdt_bo,
                'Email bố' => $hoc_sinhs->email_bo,
                'Nghề nghiệp bố' => $hoc_sinhs->nghe_nghiep_bo,
                'CMND bố' => $hoc_sinhs->cmnd_bo,
                'Năm sinh bố' => $hoc_sinhs->nam_sinh_bo,
                'Quốc tịch bố' => $hoc_sinhs->quoc_tich_bo,
                'Địa chỉ thường trú' => $hoc_sinhs->dia_chi_thuong_tru,
                'Địa chỉ' => $hoc_sinhs->dia_chi,
                'Đi bus' => $hoc_sinhs->di_bus==1?'Có':'Không',
                'Người đưa đón' => $hoc_sinhs->nguoi_dua_don,
                'Liên hệ khẩn' => $hoc_sinhs->lien_he_khan,
                'Loại học phí' => $hoc_sinhs->loai_hoc_phi==0?'Học phí kỳ':($hoc_sinhs->loai_hoc_phi==1?'Học phí năm':'Học phí tháng'),
            ];
        });
    }
    public function headings(): array
    {
        return [
            'STT',
            'Mã học sinh',
            'Họ tên',
            'Ngày nhập học',
            'Ngày update',
            'Trạng thái',
            'Ngày thôi học',
            'Nickname',
            'Giới tính',
            'Ngày sinh',
            'Quốc tịch',
            'Ngôn ngữ',
            'Cân nặng',
            'Chiều cao',
            'Nơi sinh',
            'Thông tin sức khỏe',
            'Họ tên mẹ',
            'SĐT mẹ',
            'Email mẹ',
            'Nghề nghiệp mẹ',
            'CMND mẹ',
            'Năm sinh mẹ',
            'Quốc tịch mẹ',
            'Họ tên bố',
            'SĐT bố',
            'Email bố',
            'Nghề nghiệp bố',
            'CMND bố',
            'Năm sinh bố',
            'Quốc tịch bố',
            'Địa chỉ thường trú',
            'Địa chỉ',
            'Đi bus',
            'Người đưa đón',
            'Liên hệ khẩn',
            'Loại học phí'
        ];
    }
}
