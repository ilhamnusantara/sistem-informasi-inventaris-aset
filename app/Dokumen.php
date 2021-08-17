<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $guard = [];
    protected $table = 'dokumens';
    protected $primaryKey = 'id_dokumen';
    protected $fillable = ['id_jenis','instansi','keterangan_belanja','rincian_belanja','no_spk','tgl_spk','file_spk','no_bast','tgl_bast','file_bast','merk','bahan','type','ukuran','foto','status'];

    public function jenisBelanja()
    {
        return $this->belongsTo('App\jenisBelanja','id_jenis');
    }
    public function instansi()
    {
        return $this->belongsTo('App\Instansi','id_instansi');
    }

    public function Belanja()
    {
        return $this->hasOne('App\Belanja');
    }
}
