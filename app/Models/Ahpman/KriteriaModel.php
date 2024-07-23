<?php

namespace App\Models\Ahpman;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KriteriaModel extends Model
{
    protected $table = 'kriteria';
    protected $fillable = [
        'kode',
        'nama',
    ];

    public function subkriteria(): HasMany
    {
        return $this->hasMany(SubkriteriaModel::class, 'kriteria_id', 'id');
    }

    public function perbandingan(): HasMany
    {
        return $this->hasMany(KriteriaPerbandinganModel::class, 'kriteria_left_id', 'id');
    }
}
