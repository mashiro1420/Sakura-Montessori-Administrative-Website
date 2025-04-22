<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KyModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_ky','ky','nam_hoc','tu_ngay','den_ngay'];
    protected $table = 'tt_ky';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;

}
