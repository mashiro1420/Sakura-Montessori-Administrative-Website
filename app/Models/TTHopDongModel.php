<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTHopDongModel extends Model
{
    use HasFactory;
    protected $table = 'tt_hopdong';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public function NhanVien()
    {
        return $this->belongsTo(NhanVienModel::class);
    }
}
