<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TKBNgayModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_thoi_khoa_bieu'];
    protected $table = 'tt_tkbngay';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
