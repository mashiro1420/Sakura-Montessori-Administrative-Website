<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocPhiModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_hoc_sinh'];
    protected $table = 'ql_hocphi';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
