<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuanModel extends Model
{
    use HasFactory;
    protected $fillable = ['tuan','thang','nam','tu_ngay','den_ngay'];
    protected $table = 'tt_tuan';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;

}
