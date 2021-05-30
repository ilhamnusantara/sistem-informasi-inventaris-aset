<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subBelanja extends Model
{
    protected $guard = [];
    protected $table = 'sub_belanjas';
    protected $primaryKey = 'id_sub';
    protected $fillable = ['sub_belanja','norek_sub','id_induk'];

    public function indukBelanja()
    {
        return $this->belongsTo('App\indukBelanja','id_induk');
    }

    public function jenisBelanja()
    {
        return $this->hasMany('App\jenisBelanja');
    }
}
