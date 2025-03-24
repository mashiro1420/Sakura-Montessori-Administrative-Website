<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocSinhModel extends Model
{
    use HasFactory;
    protected $table = 'ql_hocsinh';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keytype = 'string';
    public $timestamps = false;
}
