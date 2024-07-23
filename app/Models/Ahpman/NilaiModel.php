<?php

namespace App\Models\Ahpman;

use Illuminate\Database\Eloquent\Model;

class NilaiModel extends Model
{
    protected $table = 'nilai';
    protected $fillable = [
        'siswa_id', 'kriteria_id', 'nilai',
    ];
}
