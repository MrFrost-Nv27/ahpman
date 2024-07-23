<?php

namespace App\Models\Ahpman;

use Illuminate\Database\Eloquent\Model;

class SubkriteriaModel extends Model
{
    protected $table = 'subkriteria';
    protected $fillable = [
        'kriteria_id',
        "bottom_treshold",
        "upper_treshold",
        "keterangan",
        "bobot",
    ];
}
