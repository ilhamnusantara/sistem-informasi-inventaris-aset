<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisBelanja extends Model
{
    protected $guard = [];
    protected $table = 'jenis_belanjas';
    protected $primaryKey = 'id_jenis';
    protected $fillable = ['induk_jenis','sub_jenis','kategori'];


    public function dokumen()
    {
        return $this->hasMany('App\Dokumen');
    }
}
