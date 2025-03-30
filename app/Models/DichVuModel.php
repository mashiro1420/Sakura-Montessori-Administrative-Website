<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVuModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_dich_vu'];

    protected $table = 'dm_dichvu';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;

}
