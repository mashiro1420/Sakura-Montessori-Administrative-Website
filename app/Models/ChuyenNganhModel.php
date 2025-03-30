<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuyenNganhModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_chuyen_nganh'];

    protected $table = 'dm_chuyennganh';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public function BangCap()
    {
        return $this->hasMany(TTBangCapModel::class, 'id_chuyen_nganh');
    }
}
