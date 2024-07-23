<?php
/** @var \CodeIgniter\View\View $this */
?>

<?=$this->extend('layouts/panel/main')?>
<?=$this->section('main')?>
<h1 class="page-title">Dashboard</h1>
<div style="overflow:auto">
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l3">
                <div class="count-card">
                    <div class="count-number" data-entity="siswa">5</div>
                    <div class="count-desc">
                        <p><b>Jumlah</b></p>
                        <p>Peserta Didik</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="count-card">
                    <div class="count-number" data-entity="kriteria">0</div>
                    <div class="count-desc">
                        <p><b>Jumlah</b></p>
                        <p>Kriteria</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="text-card">
                    <p>
                        Proses penerimaan peserta didik baru merupakan salah satu kegiatan penting dalam dunia
                        pendidikan yang memerlukan pengambilan keputusan yang tepat dan adil. Di Madrasah Aliyah Negeri
                        (MAN) Fakfak, upaya untuk meningkatkan transparansi dan objektivitas dalam proses seleksi
                        penerimaan siswa baru terus dilakukan. Untuk itu, diperlukan sebuah sistem yang mampu mendukung
                        pengambilan keputusan dengan mempertimbangkan berbagai kriteria yang relevan.
                        <br><br>
                        Sistem Pengambilan Keputusan Penerimaan Peserta Didik di MAN Fakfak menggunakan metode
                        Analytical Hierarchy Process (AHP) hadir sebagai solusi inovatif dalam mengatasi tantangan
                        tersebut. Metode AHP merupakan teknik pengambilan keputusan yang mengurai masalah kompleks
                        menjadi struktur hierarki yang lebih sederhana, sehingga memudahkan dalam menentukan prioritas
                        dan membuat keputusan yang lebih rasional.
                        <br><br>
                        Dengan memanfaatkan sistem ini, proses seleksi penerimaan siswa baru dapat dilakukan secara
                        lebih efisien dan transparan, dimana berbagai kriteria seperti nilai akademik, prestasi
                        non-akademik, dan pertimbangan lainnya dapat dinilai secara objektif. Implementasi sistem ini
                        tidak hanya meningkatkan kepercayaan masyarakat terhadap proses seleksi, tetapi juga membantu
                        pihak sekolah dalam memperoleh peserta didik yang berkualitas.
                        <br><br>
                        Melalui pengembangan dan penerapan Sistem Pengambilan Keputusan Penerimaan Peserta Didik
                        berbasis AHP, diharapkan Madrasah Aliyah Negeri Fakfak dapat terus menjaga standar kualitas
                        pendidikan yang tinggi dan memberikan kontribusi positif terhadap perkembangan pendidikan di
                        daerah Fakfak dan sekitarnya.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>