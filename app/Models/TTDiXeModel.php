<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTDiXeModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_hoc_sinh','id_lo_trinh'];
    protected $table = 'tt_hsdixe';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
