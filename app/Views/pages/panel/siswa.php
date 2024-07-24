<?php
/** @var \CodeIgniter\View\View $this */
?>

<?=$this->extend('layouts/panel/main')?>
<?=$this->section('main')?>
<h1 class="page-title">Data Peserta Didik</h1>
<div class="page-wrapper">
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-12 text-end">
                    <button class="btn waves-effect waves-light green btn-popup" data-target="add" type="button"
                        data-target="form"><i class="material-icons left">add</i>Tambah</button>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="table-wrapper">
                        <table class="striped highlight responsive-table" id="table-siswa" width="100%">
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



<?=$this->section('popup')?>
<div class="popup side" data-page="add">
    <h1>Tambah Peserta DIdik Baru</h1>
    <br>
    <form action="" id="form-add" class="row">
        <input type="hidden" name="id" id="add-id">
        <div class="input-field col s12">
            <input name="nama" id="add-nama" type="text" class="validate" required>
            <label for="add-nama">Nama Siswa</label>
        </div>
        <div class="input-field col s12">
            <input name="username" id="add-username" type="text" class="validate" required>
            <label for="add-username">Username</label>
        </div>
        <div class="input-field col s12">
            <input name="email" id="add-email" type="email" class="validate" required>
            <label for="add-email">Email</label>
        </div>
        <div class="input-field col s12">
            <input name="password" id="add-password" type="password" class="validate" required>
            <label for="add-password">Password</label>
        </div>
        <div class="input-field col s12">
            <input name="password_confirm" id="add-password_confirm" type="password" class="validate" required>
            <label for="add-password_confirm">Konfirmasi Password</label>
        </div>
        <div class="row">
            <div class="input-field col s12 center">
                <button class="btn waves-effect waves-light green" type="submit"><i
                        class="material-icons left">save</i>Simpan</button>
            </div>
        </div>
    </form>
</div>
<div class="popup side" data-page="edit">
    <h1>Edit Data Peserta DIdik</h1>
    <br>
    <form action="" id="form-edit" class="row">
        <div class="row">
            <div class="input-field col s12 center">
                <button class="btn waves-effect waves-light green" type="submit"><i
                        class="material-icons left">save</i>Simpan</button>
            </div>
        </div>
    </form>
</div>
<div class="popup side" data-page="password">
    <h1>Ubah Password</h1>
    <br>
    <form action="" id="form-password" class="row">
        <input type="hidden" name="id" id="password-id">
        <div class="input-field col s12">
            <input name="password" id="edit-password" type="password" class="validate" required>
            <label for="edit-password">Password</label>
        </div>
        <div class="input-field col s12">
            <input name="password_confirm" id="edit-password_confirm" type="password" class="validate" required>
            <label for="edit-password_confirm">Konfirmasi Password</label>
        </div>
        <div class="row">
            <div class="input-field col s12 center">
                <button class="btn waves-effect waves-light green" type="submit"><i
                        class="material-icons left">save</i>Simpan</button>
            </div>
        </div>
    </form>
</div>
<?=$this->endSection()?>