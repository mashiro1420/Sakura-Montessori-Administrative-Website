<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_lop'];
    protected $table = 'dm_lop';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;

}
