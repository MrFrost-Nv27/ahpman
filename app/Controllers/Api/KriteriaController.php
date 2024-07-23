<?php

namespace App\Controllers\Api;

use App\Controllers\BaseApi;
use App\Models\Ahpman\KriteriaModel;
use App\Models\Ahpman\KriteriaPerbandinganModel;

class KriteriaController extends BaseApi
{
    protected $modelName = KriteriaModel::class;
    protected $load = ['subkriteria', 'perbandingan'];

    public function validateCreate(&$request)
    {
        return $this->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);
    }

    public function updateBobot()
    {
        $data = $this->request->getJSON(true);
        KriteriaPerbandinganModel::upsert($data, uniqueBy: ['kriteria_left_id', 'kriteria_right_id'], update: ['bobot']);
        return $this->respond($data);
    }
}
