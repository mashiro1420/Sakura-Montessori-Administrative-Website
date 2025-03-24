<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTDanSuModel extends Model
{
    use HasFactory;
    protected $table = 'tt_dansu';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public function NhanVien()
    {
        return $this->hasOne(NhanVienModel::class, 'id_nhan_vien', 'id');
    }
}
