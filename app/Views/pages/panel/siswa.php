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
            <input type="hidden" name="name" id="add-name">
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
        <input type="hidden" name="id" id="edit-id">
        <div class="input-field col s12">
            <input name="nama" id="edit-nama" type="text" class="validate" required>
            <input type="hidden" name="name" id="edit-name">
            <label for="edit-nama">Nama Siswa</label>
        </div>
        <div class="input-field col s12">
            <select name="jenis_kelamin" id="edit-jenis_kelamin">
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            <label>Materialize Select</label>
        </div>

        <div class="input-field col s12">
            <input name="tempat_lahir" id="edit-tempat_lahir" type="text" class="validate" required>
            <label for="edit-tempat_lahir">Tempat Lahir</label>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="text" class="form-datepicker" name="tanggal_lahir" id="edit-tanggal_lahir">
                <label for="edit-tanggal_lahir">Tanggal Lahir</label>
            </div>
        </div>
        <div class="input-field col s12">
            <textarea id="edit-alamat" name="alamat" class="materialize-textarea"></textarea>
            <label for="edit-alamat">Alamat</label>
        </div>
        <div class="input-field col s12">
            <input name="asal_sekolah" id="edit-asal_sekolah" type="text" class="validate" required>
            <label for="edit-asal_sekolah">Asal Sekolah</label>
        </div>
        <div class="input-field col s12">
            <input name="nohp" id="edit-nohp" type="text" class="validate" required>
            <label for="edit-nohp">Nomor HP</label>
        </div>
        <div class="input-field col s12">
            <input name="nama_ayah" id="edit-nama_ayah" type="text" class="validate" required>
            <label for="edit-nama_ayah">Nama Ayah</label>
        </div>
        <div class="input-field col s12">
            <input name="pekerjaan_ayah" id="edit-pekerjaan_ayah" type="text" class="validate" required>
            <label for="edit-pekerjaan_ayah">Pekerjaan Ayah</label>
        </div>
        <div class="input-field col s12">
            <input name="nama_ibu" id="edit-nama_ibu" type="text" class="validate" required>
            <label for="edit-nama_ibu">Nama Ibu</label>
        </div>
        <div class="input-field col s12">
            <input name="pekerjaan_ibu" id="edit-pekerjaan_ibu" type="text" class="validate" required>
            <label for="edit-pekerjaan_ibu">Pekerjaan Ibu</label>
        </div>
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