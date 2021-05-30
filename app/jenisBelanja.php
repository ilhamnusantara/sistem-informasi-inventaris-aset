<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisBelanja extends Model
{
    protected $guard = [];
    protected $table = 'jenis_belanjas';
    protected $primaryKey = 'id_jenis';
    protected $fillable = ['induk_belanja','kategori','id_sub'];


    public function subBelanja()
    {
        return $this->belongsTo('App\subBelanja','id_sub');
    }

    public function dokumen()
    {
        return $this->hasMany('App\Dokumen');
    }
}
