<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanLopModel extends Model
{
    use HasFactory;
    protected $fillable = [

    ];
    protected $table = 'ql_phanlop';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function GVCN()
    {
        return $this->hasOne(NhanVienModel::class, 'id', 'id_gv_cn');
    }
    public function GVNN()
    {
        return $this->hasOne(NhanVienModel::class, 'id', 'id_gv_nuoc_ngoai');
    }
    public function GVVN()
    {
        return $this->hasOne(NhanVienModel::class, 'id', 'id_gv_viet');
    }
    public function PhongHoc()
    {
        return $this->hasOne(PhongHocModel::class, 'id', 'id_phong_hoc');
    }
    public function Lop()
    {
        return $this->hasOne(LopModel::class, 'id', 'id_lop');
    }
    public function Khoi()
    {
        return $this->hasOne(KhoiModel::class, 'id', 'id_khoi');
    }
    public function HeDaoTao()
    {
        return $this->hasOne(HeDaoTaoModel::class, 'id', 'id_he_dao_tao');
    }
    public function KhoaHoc()
    {
        return $this->hasOne(KhoaHocModel::class, 'id', 'id_khoa_hoc');
    }
    public function Ky()
    {
        return $this->hasOne(KyModel::class, 'id', 'id_ky');
    }
}
