<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class indukBelanja extends Model
{
    protected $guard = [];
    protected $table = 'induk_belanjas';
    protected $primaryKey = 'id_induk';
    protected $fillable = ['induk_belanja','norek_induk'];

    public function subBelanja()
    {
        return $this->hasMany('App\subBelanja');
    }
}
