<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoanModel extends Model
{
    use HasFactory;
    protected $fillable = ['tai_khoan'];
    protected $table = 'ql_taikhoan';
    protected $primaryKey = 'tai_khoan';
    protected $keytype = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function NhanVien()
    {
        return $this->hasOne(NhanVienModel::class, 'id_nhan_vien', 'id');
    }
    public function PhanQuyen()
    {
        return $this->belongsTo(PhanQuyenModel::class);
    }
}
