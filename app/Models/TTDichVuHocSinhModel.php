<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTDichVuHocSinhModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_hoc_sinh','id_bang_gia'];
    protected $table = 'tt_hocsinhdichvu';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
