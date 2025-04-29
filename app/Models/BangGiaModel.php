<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangGiaModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_dich_vu'];
    protected $table = 'ql_banggia';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
