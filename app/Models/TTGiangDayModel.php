<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTGiangDayModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_giang_day','id_tuan'];
    protected $table = 'tt_giangday';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}

