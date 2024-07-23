<?php

namespace App\Models\Ahpman;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KriteriaPerbandinganModel extends Model
{
    protected $table = 'kriteria_perbandingan';
    protected $fillable = [
        'kriteria_left_id',
        'kriteria_right_id',
        'bobot',
    ];
}
