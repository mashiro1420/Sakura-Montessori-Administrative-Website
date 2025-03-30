<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoiModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_khoi'];
    protected $table = 'dm_khoi';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;

}
