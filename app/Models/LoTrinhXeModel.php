<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoTrinhXeModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_lai_xe','id_monitor'];
    protected $table = 'ql_lotrinhxe';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
