<?php

/** @var \CodeIgniter\View\View $this */
?>

<?= $this->extend('layouts/panel/main') ?>
<?= $this->section('main') ?>
<style>
    tr.active {
        background-color: #f5f5f5;
    }

    tr.active td {
        font-weight: bold;
    }
</style>
<h1 class="page-title">Pengumuman</h1>
<div class="page-wrapper">
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="s12">
                    <h1 class="center"><b>Berikut Hasil Pengumuman PPDB MAN Fakfak : </b></h1>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 offset-m3">
                    <table class="table striped responsive-table" id="table-pengumuman">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Siswa</th>
                                <th>Total Nilai</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>