<?php

namespace App\Imports;

use App\Models\ChucVuModel;
use App\Models\ChuyenNganhModel;
use App\Models\NhanVienModel;
use App\Models\TaiKhoanModel;
use App\Models\TTBangCapModel;
use App\Models\TTDanSuModel;
use App\Models\TTHonNhanModel;
use App\Models\TTHopDongModel;
use App\Models\TTLienHeModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NhanVienImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $all_nhan_vien = NhanVienModel::all();
        $so_nv = count($all_nhan_vien);
        $ma_nv = 'NV'.str_pad($so_nv+1,6,'0',STR_PAD_LEFT);
        NhanVienModel::upsert([
            'id' => $ma_nv,
            'ho_ten' => $row['ho_ten'],
            'gioi_tinh' => $row['gioi_tinh'],
            'noi_sinh' => $row['noi_sinh'],
            'id_chuc_vu' => ChucVuModel::where('ten_chuc_vu','like','%'.$row['chuc_vu'].'%')->first()->id,
            'ngay_sinh' => $row['ngay_sinh'],
            'ngay_vao_lam' => $row['ngay_vao_lam'],
            'cmnd' => $row['so_cmnd_ho_chieu'],
            'ngay_cap' => $row['ngay_cap'],
            'noi_cap' => $row['noi_cap'],
            'dan_toc' => $row['dan_toc'],
            'ton_giao' => $row['ton_giao'],
            'quoc_tich' => $row['quoc_tich'],
        ],['id'], ['ho_ten', 'gioi_tinh', 'noi_sinh', 'ngay_sinh', 'ngay_vao_lam', 'cmnd', 'ngay_cap', 'noi_cap', 'dan_toc', 'ton_giao', 'quoc_tich']);

        TTHonNhanModel::upsert([
            'id_nhan_vien' => $ma_nv,
            'tinh_trang_hon_nhan' => $row['tinh_trang_hon_nhan'],
            'so_con' => $row['so_con'],
        ],['id'], ['tinh_trang_hon_nhan', 'so_con']);

        TTLienHeModel::upsert([
            'id_nhan_vien' => $ma_nv,
            'sdt_rieng' => $row['dt_di_dong'],
            'sdt_noi_bo' => $row['so_noi_bo'],
            'email_noi_bo' => $row['email_noi_bo'],
            'email_rieng' => $row['email_ca_nhan'],
        ],['id'], ['sdt_rieng', 'sdt_noi_bo', 'email_noi_bo', 'email_rieng']);
        
        TTBangCapModel::upsert([
            'id_nhan_vien' => $ma_nv,
            'trinh_do_hoc_van' => $row['trinh_do_hoc_van'],
            'trinh_do_chuyen_mon' => $row['trinh_do_chuyen_mon'],
            'trinh_do_chinh' => $row['trinh_do_chuyen_mon_chinh'],
            'hinh_thuc_dao_tao' => $row['hinh_thuc_dao_tao'],
            'chung_chi' => $row['chung_chi'],
            'montessori' => $row['mon_qt'],
            'truong_dao_tao' => $row['truong_dao_tao'],
            'chuyen_nganh' => ChuyenNganhModel::where('ten_chuyen_nganh','like','%'.$row['chuyen_nganh'].'%')->first()->id,
            'xep_loai' => $row['xep_loai_tdcm'],
            'nam_tot_nghiep' => $row['nam_tot_nghiep'],
        ],['id'], ['trinh_do_hoc_van', 'trinh_do_chuyen_mon', 'trinh_do_chinh', 'hinh_thuc_dao_tao', 'chung_chi', 'montessori', 'truong_dao_tao', 'xep_loai', 'nam_tot_nghiep']);
      
        TTDanSuModel::upsert([
            'id_nhan_vien' => $ma_nv,
            'so_bhxh' => $row['so_so_bhxh'],
            'thang_tham_gia_bhxh' => $row['tham_gia_bhxh'],
            'ma_so_thue' => $row['ma_so_thue'],
            'thuong_tru' => $row['dia_chi_thuong_tru'],
            'tam_tru' => $row['dia_chi_tam_tru'],
            'khai_sinh' => $row['dia_chi_khai_sinh'],
        ],['id'], ['so_bhxh', 'thang_tham_gia_bhxh', 'ma_so_thue', 'thuong_tru', 'tam_tru', 'khai_sinh']);

        TTHopDongModel::upsert([
            'id_nhan_vien' => $ma_nv,
            'loai_hd' => $row['loai_hop_dong'],
            'so_hd' => $row['so_hop_dong'],
            'ngay_ky' => $row['ngay_ky_hop_dong'],
            'ngay_ket_thuc' => $row['ngay_ket_thuc_hop_dong'],
        ],['id'], ['loai_hd', 'so_hd', 'ngay_ky', 'ngay_ket_thuc']);
        TaiKhoanModel::upsert([
            'tai_khoan' => $ma_nv,
            'id_nhan_vien' => $ma_nv,
            'la_khach' => false,
            'id_quyen' => 3,
        ],['tai_khoan'], ['id_nhan_vien', 'la_khach', 'id_quyen']);
    }   
}
