<?php

namespace App\Models\Ahpman;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
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
}
