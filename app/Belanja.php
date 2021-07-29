<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Belanja extends Model
{
    protected $guard = [];
    protected $table = 'belanjas';
    protected $primaryKey = 'id_belanja';
    protected $fillable = ['id_dokumen','satuan','volume','nominal_belanja','id_rekanan','no_pbb_ls','tanggal_belanja','sp2d','tanggal_sp2d','nilai_sp2d','status'];

    public function Dokumen()
    {
        return $this->belongsTo('App\Dokumen','id_dokumen');
    }
    public function rekanan()
    {
        return $this->belongsTo('App\Rekanan','id_rekanan');
    }
}
