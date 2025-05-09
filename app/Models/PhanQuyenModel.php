<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanQuyenModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_tai_khoan','id_quyen'];
    protected $table = 'ql_phanquyen';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function TaiKhoan()
    {
        return $this->belongsTo(TaiKhoanModel::class);
    }
    public function Quyen()
    {
        return $this->hasOne(QuyenModel::class, 'id', 'id_quyen');
    }
}
