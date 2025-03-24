<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVienModel extends Model
{
    use HasFactory;
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
        return $this->hasOne(NhanVienModel::class, 'id', 'id_nhan_vien');
    }
}
