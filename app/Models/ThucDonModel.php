<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThucDonModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_tuan'];
    protected $table = 'ql_thucdon';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
