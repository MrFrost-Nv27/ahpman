<?php

/** @var \CodeIgniter\View\View $this */
?>

<?= $this->extend('layouts/panel/main') ?>
<?= $this->section('main') ?>
<h1 class="page-title">Hasil Perhitungan</h1>
<div class="page-wrapper">
    <div class="page">
        <div class="container">
            <div class="row">
                <br>
                <h1 class="center"><b>Bobot Kriteria</b></h1>
                <br>
                <hr>
                <br>
                <div class="center">
                    <table id="pairwise">
                        <thead>
                            <tr>
                                <th style="width: 5rem"></th>
                                <?php foreach ($kriteria as $k): ?>
                                    <th style="width: 5rem"><?= $k->kode ?></th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kriteria as $k): ?>
                                <tr>
                                    <td><?= $k->kode ?></td>
                                    <?php foreach ($kriteria as $l): ?>
                                        <td class="<?= $k->id ?>-<?= $l->id ?>">
                                            <?= $k->perbandingan->where("kriteria_right_id", $l->id)->first()?->bobot ?? 1 ?>
                                        </td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Jumlah</td>
                                <?php foreach ($kriteria as $k): ?>
                                    <td></td>
                                <?php endforeach ?>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row normalize" style="display:none">
                <br>
                <h1 class="center"><b>Matrix Nilai Kriteria (Normalisasi)</b></h1>
                <br>
                <hr>
                <br>
                <div class="center">
                    <table id="normalize">
                        <thead>
                            <tr>
                                <th></th>
                                <?php foreach ($kriteria as $k): ?>
                                    <th><?= $k->kode ?></th>
                                <?php endforeach ?>
                                <th>Jumlah</th>
                                <th>Prioritas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kriteria as $k): ?>
                                <tr>
                                    <td><?= $k->kode ?></td>
                                    <?php foreach ($kriteria as $l): ?>
                                        <td class="<?= $k->id ?>-<?= $l->id ?>"></td>
                                    <?php endforeach ?>
                                    <td class="jumlah-<?= $k->id ?>"></td>
                                    <td class="prioritas-<?= $k->id ?>"></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Jumlah</td>
                                <?php foreach ($kriteria as $k): ?>
                                    <td></td>
                                <?php endforeach ?>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row eigen" style="display:none">
                <br>
                <h1 class="center"><b>Matrix Eigen Value</b></h1>
                <br>
                <hr>
                <br>
                <div class="center">
                    <table id="eigen">
                        <thead>
                            <tr>
                                <th></th>
                                <?php foreach ($kriteria as $k): ?>
                                    <th><?= $k->kode ?></th>
                                <?php endforeach ?>
                                <th>Jumlah</th>
                                <th>Eigen Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kriteria as $k): ?>
                                <tr>
                                    <td><?= $k->kode ?></td>
                                    <?php foreach ($kriteria as $l): ?>
                                        <td class="<?= $k->id ?>-<?= $l->id ?>"></td>
                                    <?php endforeach ?>
                                    <td class="jumlah-<?= $k->id ?>"></td>
                                    <td class="eigen-<?= $k->id ?>"></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="<?= count($kriteria) + 2 ?>">Jumlah</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row crcalc" style="display:none">
                <br>
                <h1 class="center"><b>Nilai Rasio Konsistensi (CR)</b></h1>
                <br>
                <hr>
                <br>
                <div class="col s12 m6 offset-m3 center">
                    <table id="cr">
                        <tbody>
                            <tr>
                                <th>n</th>
                                <td class="n"></td>
                            </tr>
                            <tr>
                                <th>CI</th>
                                <td class="ci"></td>
                            </tr>
                            <tr>
                                <th>RI</th>
                                <td class="ri"></td>
                            </tr>
                            <tr>
                                <th>CR</th>
                                <td class="cr"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row alternatif" style="display:none">
                <br>
                <h1 class="center"><b>Bobot Sub Kriteria</b></h1>
                <br>
                <hr>
                <br>
                <div class="col s12 m6 offset-m3">
                    <?php foreach ($kriteria as $k): ?>
                        <p class="center"><?= $k->nama ?></p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($k->subkriteria as $subkriteria): ?>
                                    <tr>
                                        <td><?= $subkriteria->keterangan ?></td>
                                        <td><?= $subkriteria->bobot ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php endforeach ?>
                    <br>
                </div>

                <div class="col s12">

                    <br>
                    <h1 class="center"><b>Tabel Nilai Alternatif</b></h1>
                    <br>
                    <hr>
                    <br>
                    <div class="center">
                        <table id="alternatif">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <?php foreach ($kriteria as $k): ?>
                                        <th><?= $k->kode ?></th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($siswa as $s): ?>
                                    <tr>
                                        <td><?= $s->nama ?></td>
                                        <?php foreach ($kriteria as $k): ?>
                                            <td><?= $s->nilai?->where("kriteria_id", $k->id)->first()?->nilai ?? 0 ?></td>
                                        <?php endforeach ?>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col s12">
                    <br>
                    <h1 class="center"><b>Tabel Hasil Perhitungan</b></h1>
                    <br>
                    <hr>
                    <br>
                    <div class="center">
                        <table id="hasil">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <?php foreach ($kriteria as $k): ?>
                                        <th><?= $k->kode ?></th>
                                    <?php endforeach ?>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($siswa as $s): ?>
                                    <tr>
                                        <td><?= $s->nama ?></td>
                                        <?php foreach ($kriteria as $k): ?>
                                            <td></td>
                                        <?php endforeach ?>
                                        <td></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row ranking" style="display:none">
                <br>
                <h1 class="center"><b>Tabel Ranking</b></h1>
                <br>
                <hr>
                <br>
                <div class="col s12 m6 offset-m3 center">
                    <table id="ranking">
                        <thead>
                            <tr>
                                <th>Ranking</th>
                                <th>Nama Siswa</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($siswa as $s): ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row center">
                <p id="keterangan" style="margin-bottom: 0.5rem">Menghitung Jumlah Perkolom Matrix Kriteria</p>
                <button class="btn waves-effect waves-light green btn-action" id="btn-hitung"
                    data-step="1">Lanjut</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>