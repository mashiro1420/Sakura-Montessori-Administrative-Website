<?php

namespace App\Exports;

use App\Models\NhanVienModel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NhanVienExport implements FromCollection, WithHeadings
{
    use Exportable;
    protected $nhan_viens;
    public function __construct($nhan_viens)
    {
        $this->nhan_viens = $nhan_viens;
        
    }
    public function collection()
    {
        return collect($this->nhan_viens)->map(function ($nhan_viens, $index) {
            return [
                'STT' => $index + 1,
                'Mã nhân viên' => $nhan_viens->id,
                'Họ tên' => $nhan_viens->ho_ten,
                'Giới tính' => $nhan_viens->gioi_tinh,
                'Nơi sinh' => $nhan_viens->noi_sinh,
                'Ngày sinh' => $nhan_viens->ngay_sinh,
                'Ngày vào làm' => $nhan_viens->ngay_vao_lam,
                'Ngày nghỉ việc' => $nhan_viens->ngay_nghi_viec,
                'Chức vụ' => $nhan_viens->chuc_vu,
                'Số CMND/ hộ chiếu' => $nhan_viens->cmnd,
                'Ngày cấp' => $nhan_viens->ngay_cap,
                'Nơi cấp' => $nhan_viens->noi_cap,
                'Quốc tịch' => $nhan_viens->quoc_tich,
                'Dân tộc' => $nhan_viens->dan_toc,
                'Tôn giáo' => $nhan_viens->ton_giao,
                'ĐT di động' => $nhan_viens->sdt_rieng,
                'Số nội bộ' => $nhan_viens->sdt_noi_bo,
                'Email cá nhân' => $nhan_viens->email_rieng,
                'Email nội bộ' => $nhan_viens->email_noi_bo,
                'Tình trạng hôn nhân' => $nhan_viens->tinh_trang_hon_nhan,
                'Số con' => $nhan_viens->so_con,
                'Số sổ BHXH' => $nhan_viens->so_bhxh,
                'Tham gia BHXH' => $nhan_viens->thang_tham_gia_bhxh,
                'Mã số thuế' => $nhan_viens->ma_so_thue,
                'Địa chỉ thường trú' => $nhan_viens->thuong_tru,
                'Địa chỉ tạm trú' => $nhan_viens->tam_tru,
                'Địa chỉ khai sinh' => $nhan_viens->khai_sinh,
                'Trình độ học vấn' => $nhan_viens->trinh_do_hoc_van,
                'Trình độ chuyên môn' => $nhan_viens->trinh_do_chuyen_mon,
                'Trình độ chuyên môn chính' => $nhan_viens->trinh_do_chinh,
                'Trường đào tạo' => $nhan_viens->truong_dao_tao,
                'Chuyên ngành' => $nhan_viens->chuyen_nganh,
                'Xếp loại TĐCM' => $nhan_viens->xep_loai,
                'Hình thức đào tạo' => $nhan_viens->hinh_thuc_dao_tao,
                'Năm tốt nghiệp' => $nhan_viens->nam_tot_nghiep,
                'Chứng chỉ' => $nhan_viens->chung_chi,
                'Mon QT' => $nhan_viens->montessori,
                'Loại hợp đồng' => $nhan_viens->loai_hd,
                'Số hợp đồng' => $nhan_viens->so_hd,
                'Ngày ký hợp đồng' => $nhan_viens->ngay_ky,
                'Ngày kết thúc hợp đồng' => $nhan_viens->ngay_ket_thuc,
            ];
        });
    }
    public function headings(): array
    {
        return ['STT',
        'Mã nhân viên',
        'Họ tên',
        'Giới tính',
        'Nơi sinh',
        'Ngày sinh',
        'Ngày vào làm',
        'Ngày nghỉ việc',
        'Chức vụ',
        'Số CMND/ hộ chiếu',
        'Ngày cấp',
        'Nơi cấp',
        'Quốc tịch',
        'Dân tộc',
        'Tôn giáo',
        'ĐT di động',
        'Số nội bộ',
        'Email cá nhân',
        'Email nội bộ',
        'Tình trạng hôn nhân',
        'Số con',
        'Số sổ BHXH',
        'Tham gia BHXH',
        'Mã số thuế',
        'Địa chỉ thường trú',
        'Địa chỉ tạm trú',
        'Địa chỉ khai sinh',
        'Trình độ học vấn',
        'Trình độ chuyên môn',
        'Trình độ chuyên môn chính',
        'Trường đào tạo',
        'Chuyên ngành',
        'Xếp loại TĐCM',
        'Hình thức đào tạo',
        'Năm tốt nghiệp',
        'Chứng chỉ',
        'Mon QT',
        'Loại hợp đồng',
        'Số hợp đồng',
        'Ngày ký hợp đồng',
        'Ngày kết thúc hợp đồng',];
    }
}