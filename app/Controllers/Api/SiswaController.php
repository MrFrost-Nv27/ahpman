<?php

namespace App\Controllers\Api;

use App\Controllers\BaseApi;
use App\Models\Ahpman\NilaiModel;
use App\Models\Ahpman\SiswaModel;

class SiswaController extends BaseApi
{
    protected $modelName = SiswaModel::class;

    protected $load = ['nilai'];

    public function updateNilai()
    {
        $data = $this->request->getJSON(true);
        NilaiModel::upsert($data, uniqueBy: ['siswa_id', 'kriteria_id'], update: ['nilai']);
        return $this->respond($data);
    }
}