<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LokasiKerja extends Model
{
    protected $table = 'lokasi_kerja';
    protected $fillable = ['lokasi_kerja_id', 'lokasi_kerja_nama'];
}
