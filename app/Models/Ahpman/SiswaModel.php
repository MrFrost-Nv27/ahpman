<?php

namespace App\Models\Ahpman;

use App\Models\PenggunaModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        "user_id",
        "nama",
        "jenis_kelamin",
        "tempat_lahir",
        "tanggal_lahir",
        "alamat",
        "asal_sekolah",
        "nohp",
        "nama_ayah",
        "nama_ibu",
        "pekerjaan_ayah",
        "pekerjaan_ibu",
        "foto",
    ];

    public function nilai() : HasMany
    {
        return $this->hasMany(NilaiModel::class, 'siswa_id', 'id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(PenggunaModel::class, 'user_id', 'id');
    }
}
