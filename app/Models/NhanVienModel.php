<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVienModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ho_ten',
        'gioi_tinh',
        'noi_sinh',
        'id_chuc_vu',
        'ngay_sinh',
        'ngay_vao_lam',
        'cmnd',
        'ngay_cap',
        'noi_cap',
        'dan_toc',
        'ton_giao',
        'quoc_tich'
    ];
    protected $table = 'ql_nhanvien';
    protected $primaryKey = 'id';
    protected $keytype = 'string';
    public $incrementing = false;
    public $timestamps = false;
    public function ChucVu()
    {
        return $this->hasOne(ChucVuModel::class, 'id', 'id_chuc_vu');
    }
    public function TaiKhoan()
    {
        return $this->hasOne(TaiKhoanModel::class, 'id', 'id_nhan_vien');
    }
    public function BangCap()
    {
        return $this->hasOne(TTBangCapModel::class, 'id', 'id_nhan_vien');
    }
    public function LienHe()
    {
        return $this->hasOne(TTLienHeModel::class, 'id', 'id_nhan_vien');
    }
    public function DanSu()
    {
        return $this->hasOne(TTDanSuModel::class, 'id', 'id_nhan_vien');
    }
    public function HonNhan()
    {
        return $this->hasOne(TTHonNhanModel::class, 'id', 'id_nhan_vien');
    }
    public function HopDong()
    {
        return $this->hasOne(TTHopDongModel::class, 'id', 'id_nhan_vien');
    }
}
