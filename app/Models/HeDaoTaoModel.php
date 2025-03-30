<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeDaoTaoModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_he_dao_tao'];
    protected $table = 'dm_hedaotao';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;

}
