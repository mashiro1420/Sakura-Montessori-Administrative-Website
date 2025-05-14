<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuyenXeModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_tuyen_xe'];
    protected $table = 'dm_tuyenxe';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
