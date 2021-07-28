<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $guard = [];
    protected $table = 'instansis';
    protected $primaryKey = 'id_instansi';
    protected $fillable = ['nama_instansi','alamat','no_telp'];
    
}
