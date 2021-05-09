<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    protected $guard = [];
    protected $table = 'pajaks';
    protected $primaryKey = 'id_pajak';
    protected $fillable = ['id_belanja','jenis_pajak','nominal_pajak','id_billing','ntpn'];
}
