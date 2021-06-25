<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $guard = [];
    protected $table = 'dokumens';
    protected $primaryKey = 'id_dokumen';
    protected $fillable = ['keterangan_belanja','id_jenis','rincian_belanja','no_spk','tgl_spk','file_spk','no_bast','tgl_bast','file_bast','merk','bahan','type','ukuran','foto','status'];

    public function jenisBelanja()
    {
        return $this->belongsTo('App\jenisBelanja','id_jenis');
    }

    public function Belanja()
    {
        return $this->hasOne('App\Belanja');
    }
}
