<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisBelanja extends Model
{
    protected $guard = [];
    protected $fillable = ['id_jenis','induk_jenis','nama_jenis'];
    protected $primaryKey = 'id_jenis';
    protected $table = 'jenis_belanjas';
    //
}
