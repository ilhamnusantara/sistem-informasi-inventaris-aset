<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisBelanja extends Model
{
    protected $guard = [];
    protected $table = 'jenis_belanjas';
    protected $primaryKey = 'id_jenis';
    protected $fillable = ['induk_belanja','sub_belanja','jenis_belanja','kategori'];


    public function dokumen()
    {
        return $this->hasMany('App\Dokumen');
    }
}
