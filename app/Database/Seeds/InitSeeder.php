<?php

namespace App\Database\Seeds;

use App\Models\Ahpman\KriteriaModel;
use App\Models\Ahpman\KriteriaPerbandinganModel;
use App\Models\Ahpman\SubkriteriaModel;
use App\Models\PenggunaModel;
use CodeIgniter\Database\Seeder;

class InitSeeder extends Seeder
{
    public function run()
    {
        $path = APPPATH . 'Database/Seeds/json/';
        PenggunaModel::create([
            'username' => 'admin',
            'name' => 'Admin',
        ])->setEmailIdentity([
            'email' => 'admin@gmail.com',
            'password' => "password",
        ])->addGroup('admin')->activate();

        KriteriaModel::create([
            'id' => 1,
            'kode' => 'C1',
            'nama' => 'Tes Membaca',
        ]);
        KriteriaModel::create([
            'id' => 2,
            'kode' => 'C2',
            'nama' => 'Tes Menulis',
        ]);
        KriteriaModel::create([
            'id' => 3,
            'kode' => 'C3',
            'nama' => 'Tes Hafalan Al-Qur‟an',
        ]);
        KriteriaModel::create([
            'id' => 4,
            'kode' => 'C4',
            'nama' => 'Wawancara',
        ]);
        KriteriaModel::create([
            'id' => 5,
            'kode' => 'C5',
            'nama' => 'Tes Praktik Sholat',
        ]);
        KriteriaModel::create([
            'id' => 6,
            'kode' => 'C6',
            'nama' => 'Tes Akademik',
        ]);

        for ($i = 0; $i < 6; $i++) {
            SubkriteriaModel::create([
                'kriteria_id' => $i + 1,
                "bottom_treshold" => 0,
                "upper_treshold" => 70,
                "keterangan" => "<70",
                "bobot" => 0.11,
            ]);
            SubkriteriaModel::create([
                'kriteria_id' => $i + 1,
                "bottom_treshold" => 70,
                "upper_treshold" => 85,
                "keterangan" => "70-85",
                "bobot" => 0.26,
            ]);
            SubkriteriaModel::create([
                'kriteria_id' => $i + 1,
                "bottom_treshold" => 85,
                "upper_treshold" => 100,
                "keterangan" => ">85",
                "bobot" => 0.63,
            ]);
        }
        foreach (array_chunk(json_decode(file_get_contents($path . 'kriteria_perbandingan.json'), true), 1000) as $t) {
            KriteriaPerbandinganModel::upsert($t, ['id'], [
                'kriteria_left_id',
                'kriteria_right_id',
                'bobot',
                'created_at',
                'updated_at',
            ], );
        }

    }
}
