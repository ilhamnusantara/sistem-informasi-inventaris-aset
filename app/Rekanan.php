<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekanan extends Model
{
    protected $guard = [];
    protected $table = 'rekanans';
    protected $primaryKey = 'id_rekanan';
    protected $fillable = ['nama_rekanan','alamat','nama_pimpinan','no_telp','no_npwp','no_sip','email'];
}
