<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTBangCapModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_nhan_vien','id_chuyen_nganh'];
    protected $table = 'tt_bangcap';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public function NhanVien()
    {
        return $this->belongsTo(NhanVienModel::class);
    }
    public function ChuyenNganh()
    {
        return $this->belongsTo(ChuyenNganhModel::class,'id_chuyen_nganh');
    }
}
