<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    protected $table = 'unit_kerja';
    protected $fillable = ['unit_kerja_id', 'unit_kerja_nama', 'lokasi_kerja_id'];
}
