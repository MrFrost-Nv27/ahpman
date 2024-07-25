<?php
/** @var \CodeIgniter\View\View $this */
?>

<?=$this->extend('layouts/panel/main')?>
<?=$this->section('main')?>
<h1 class="page-title">Data Nilai Ujian</h1>
<div class="page-wrapper">
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="s12">
                    <h1 class="center"><b>Berikut Nilai Ujian Anda : </b></h1>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 offset-m3">
                    <table>
                        <tbody>
                            <?php foreach ($kriteria as $k) : ?>
                                <tr>
                                    <th><?=$k->nama?></th>
                                    <td>:</td>
                                    <td><?= $siswa->nilai?->where('kriteria_id', $k->id)->first()->nilai ?? "Belum Dinilai" ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>