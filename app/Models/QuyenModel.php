<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyenModel extends Model
{
    use HasFactory;
    protected $table = 'dm_quyen';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function TaiKhoan()
    {
        return $this->hasMany(TaiKhoanModel::class, 'id_quyen', 'id');
    }
}
