<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangDayModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_phan_lop','id_ky'];
    protected $table = 'ql_giangday';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
