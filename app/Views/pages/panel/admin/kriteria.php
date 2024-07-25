<?php
/** @var \CodeIgniter\View\View $this */
?>

<?=$this->extend('layouts/panel/main')?>
<?=$this->section('main')?>
<h1 class="page-title">Data Gejala</h1>
<div class="page-wrapper">
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs tabs-fixed-width">
                        <li class="tab col s3"><a href="#test1">Kriteria</a></li>
                        <li class="tab col s3"><a href="#test2">Subkriteria</a></li>
                    </ul>
                </div>
                <div id="test1" class="col s12">

                    <form method="POST" action="" class="row" id="form-kriteria">
                        <div class="input-field col s5">
                            <input name="kode" id="kode" type="text" class="validate" required>
                            <label for="kode">Kode</label>
                        </div>
                        <div class="input-field col s5">
                            <input name="nama" id="nama" type="text" class="validate" required>
                            <label for="nama">Keterangan</label>
                        </div>
                        <div class="input-field col s2">
                            <button class="btn waves-effect waves-light green" type="submit"><i
                                    class="material-icons left">add</i>Tambah</button>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col s12">
                            <div class="table-wrapper">
                                <table class="striped highlight responsive-table" id="table-kriteria" width="100%">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <table class="perbandingan">
                    </table>
                    <div class="col s12 center">
                        <button class="btn waves-effect waves-light green btn-action" data-action="perbandingan" id="btn-perbandingan"><i
                                class="material-icons left">save</i>Simpan</button>
                    </div>
                </div>
                <div id="test2" class="col s12">
                    <br>
                    <h1 class="center"><b>Bobot Sub Kriteria</b></h1>
                    <br>
                    <hr>
                    <br>
                    <div class="col s12 m6 offset-m3">
                        <?php foreach ($kriteria as $k): ?>
                        <p class="center"><?=$k->nama?></p>
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
                                    <td><?=$subkriteria->keterangan?></td>
                                    <td><?=$subkriteria->bobot?></td>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                        <br>
                        <?php endforeach?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>