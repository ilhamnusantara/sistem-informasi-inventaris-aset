<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Belanja extends Model
{
    protected $guard = [];
    protected $table = 'belanjas';
    protected $primaryKey = 'id_belanja';
    protected $fillable = ['id_dokumen','no_pbb_ls','rekanan','nominal_belanja','tanggal_belanja','sp2d','tanggal_sp2d','status'];

    public function Dokumen()
    {
        return $this->belongsTo('App\Dokumen','id_dokumen');
    }
}
