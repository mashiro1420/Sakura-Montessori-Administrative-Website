<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVuModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_chuc_vu'];
    protected $table = 'dm_chucvu';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function NhanVien()
    {
        return $this->hasMany(NhanVienModel::class, 'id_chuc_vu', 'id');
    }
}
