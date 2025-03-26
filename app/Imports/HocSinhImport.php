<?php

namespace App\Imports;

use App\Models\HocSinhModel;
use App\Models\TaiKhoanModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HocSinhImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $all_hoc_sinh = HocSinhModel::all();
        $so_hs = count($all_hoc_sinh);
        $ma_hs = 'SB'.str_pad($so_hs+1,10,'0',STR_PAD_LEFT);
        HocSinhModel::upsert([
            'id' => $ma_hs,
            'ho_ten' => $row['ho_ten'],
            'ngay_nhap_hoc' => $row['ngay_nhap_hoc'],
            'ngay_update' => date('Y-m-d'),
            'trang_thai' => $row['trang_thai']=="Đang học"?1:0,
            'ngay_thoi_hoc' => $row['ngay_thoi_hoc'],
            'nickname' => $row['nickname'],
            'gioi_tinh' => $row['gioi_tinh'],
            'ngay_sinh' => $row['ngay_sinh'],
            'quoc_tich' => $row['quoc_tich'],
            'ngon_ngu' => $row['ngon_ngu'],
            'can_nang' => $row['can_nang'],
            'chieu_cao' => $row['chieu_cao'],
            'noi_sinh' => $row['noi_sinh'],
            'thong_tin_suc_khoe' => $row['thong_tin_suc_khoe'],
            'di_bus' => $row['di_bus']=="Có"?1:0,
            'ho_ten_me' => $row['ho_ten_me'],
            'sdt_me' => $row['sdt_me'],
            'email_me' => $row['email_me'],
            'nghe_nghiep_me' => $row['nghe_nghiep_me'],
            'cmnd_me' => $row['cmnd_me'],
            'nam_sinh_me' => $row['nam_sinh_me'],
            'quoc_tich_me' => $row['quoc_tich_me'],
            'ho_ten_bo' => $row['ho_ten_bo'],
            'sdt_bo' => $row['sdt_bo'],
            'email_bo' => $row['email_bo'],
            'nghe_nghiep_bo' => $row['nghe_nghiep_bo'],
            'cmnd_bo' => $row['cmnd_bo'],
            'nam_sinh_bo' => $row['nam_sinh_bo'],
            'quoc_tich_bo' => $row['quoc_tich_bo'],
            'dia_chi_thuong_tru' => $row['dia_chi_thuong_tru'],
            'dia_chi' => $row['dia_chi'],
            'nguoi_dua_don' => $row['nguoi_dua_don'],
            'lien_he_khan' => $row['lien_he_khan'],
            'loai_hoc_phi' => $row['loai_hoc_phi']=="Học phí kỳ"?0:($row['loai_hoc_phi']=="Học phí năm"?1:2),
        ],['id'], ['ho_ten', 'ngay_nhap_hoc', 'ngay_thoi_hoc', 'nickname', 'gioi_tinh', 'ngay_sinh', 'quoc_tich', 'ngon_ngu', 'can_nang', 'chieu_cao', 'noi_sinh', 'thong_tin_suc_khoe', 'di_bus', 'ho_ten_me', 'sdt_me', 'email_me', 'nghe_nghiep_me', 'cmnd_me', 'nam_sinh_me', 'quoc_tich_me', 'ho_ten_bo', 'sdt_bo', 'email_bo', 'nghe_nghiep_bo', 'cmnd_bo', 'nam_sinh_bo', 'quoc_tich_bo', 'dia_chi_thuong_tru', 'dia_chi', 'nguoi_dua_don', 'lien_he_khan', 'loai_hoc_phi']);
        TaiKhoanModel::upsert([
            'tai_khoan' => $ma_hs,
            'id_hoc_sinh' => $ma_hs,
            'la_khach' => true,
            'id_quyen' => 2,
        ],['tai_khoan'], ['id_hoc_sinh', 'la_khach', 'id_quyen']);
    }
}
