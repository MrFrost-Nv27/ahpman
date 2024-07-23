<?php
/** @var \CodeIgniter\View\View $this */
?>

<?=$this->extend('layouts/panel/main')?>
<?=$this->section('main')?>
<h1 class="page-title">Data Peserta Didik</h1>
<div class="page-wrapper">
    <div class="page">
        <div class="container">
            <form method="POST" action="" class="row" id="form-siswa">
                <div class="input-field col s5">
                    <input name="code" id="code" type="text" class="validate" required>
                    <label for="code">id</label>
                </div>
                <div class="input-field col s5">
                    <input name="name" id="name" type="text" class="validate" required>
                    <label for="name">Nama</label>
                </div>
                <div class="input-field col s2">
                    <button class="btn waves-effect waves-light green" type="submit"><i
                            class="material-icons left">add</i>Tambah</button>
                </div>
            </form>
            <div class="row">
                <div class="col s12">
                    <div class="table-wrapper">
                        <table class="striped highlight responsive-table" id="" width="100%">
                            <thead>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>