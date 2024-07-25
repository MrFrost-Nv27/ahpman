<?php
/** @var \CodeIgniter\View\View $this */
?>

<?=$this->extend('layouts/panel/main')?>
<?=$this->section('main')?>
<style>
.col.s4 p {
    display: flex;
    justify-content: start;
    align-items: center;
}
</style>
<h1 class="page-title">Data Peserta Didik</h1>
<div class="page-wrapper">
    <div class="page">
        <div class="container">
            <form class="row" method="POST" id="form-profil">
                <input type="hidden" name="id" id="id">
                <div class="col s12">
                    <table>
                        <tbody>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>:</td>
                                <td>
                                    <input type="text" name="nama" id="nama" required>
                                    <input type="hidden" name="name" id="name">
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>:</td>
                                <td>
                                    <select name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>:</td>
                                <td>
                                    <input required type="text" name="tempat_lahir" id="tempat_lahir">
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>:</td>
                                <td>
                                    <input required type="text" class="form-datepicker" name="tanggal_lahir" id="tanggal_lahir">
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>
                                    <textarea id="alamat" name="alamat" class="materialize-textarea"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Asal Sekolah</th>
                                <td>:</td>
                                <td>
                                    <input name="asal_sekolah" id="asal_sekolah" type="text" class="validate">
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor HP</th>
                                <td>:</td>
                                <td>
                                    <input name="nohp" id="nohp" type="text" class="validate">
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Ayah</th>
                                <td>:</td>
                                <td>
                                    <input name="nama_ayah" id="nama_ayah" type="text" class="validate">
                                </td>
                            </tr>
                            <tr>
                                <th>Pekerjaan Ayah</th>
                                <td>:</td>
                                <td>
                                    <input name="pekerjaan_ayah" id="pekerjaan_ayah" type="text" class="validate">
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Ibu</th>
                                <td>:</td>
                                <td>
                                    <input name="nama_ibu" id="nama_ibu" type="text" class="validate">
                                </td>
                            </tr>
                            <tr>
                                <th>Pekerjaan Ibu</th>
                                <td>:</td>
                                <td>
                                    <input name="pekerjaan_ibu" id="pekerjaan_ibu" type="text" class="validate">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="input-field col s12 center">
                    <button class="btn waves-effect waves-light green" type="submit"><i
                            class="material-icons left">save</i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?=$this->endSection()?>