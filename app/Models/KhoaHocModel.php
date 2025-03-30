<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHocModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_khoa_hoc'];
    protected $table = 'dm_khoahoc';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;

}
