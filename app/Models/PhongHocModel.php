<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongHocModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_phong_hoc'];
    protected $table = 'dm_phonghoc';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;

}
