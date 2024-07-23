<?php
/** @var \CodeIgniter\View\View $this */
?>

<?=$this->extend('layouts/landing/main')?>
<?=$this->section('main')?>


<div class="page" id="hero">
    <div class="herotext-wrapper">
        <h1>Penerimaan Calon <br>Siswa Siswi Baru</h1>
        <div class="desc">
            <h2>Madrasah Aliyah Negeri Fakfak</h2>
            <br>
            <p>Selamat datang di Sistem Pengambilan Keputusan Penerimaan Peserta Didik di Madrasah Aliyah Negeri Fakfak! Dengan menggunakan metode Analytical Hierarchy Process (AHP), sistem ini dirancang untuk meningkatkan transparansi dan objektivitas dalam proses seleksi siswa baru. AHP memungkinkan kami untuk menguraikan berbagai kriteria penting, seperti prestasi akademik dan non-akademik, menjadi struktur yang lebih mudah dikelola, sehingga setiap keputusan penerimaan didasarkan pada penilaian yang rasional dan adil. Kami berkomitmen untuk memastikan bahwa proses penerimaan berjalan efisien dan menghasilkan peserta didik yang berkualitas, guna mendukung pencapaian standar pendidikan terbaik di MAN Fakfak.</p>
        </div>
        <a href="#" class="next-page"></a>
    </div>
    <div class="hero-wrapper">
        <img src="<?=base_url('img/hero.jpg')?>" class="hero" alt="hero">
    </div>
</div>
<div class="page">
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <h1>Page 2</h1>
            </div>
            <div class="col s12 m6">
                <img src="<?=base_url('img/hero.jpg')?>" class="hero" alt="hero">
            </div>
        </div>
    </div>
</div>

<a href="<?=base_url('panel')?>" class="btn-login"><i class="material-icons">tune</i> Dashboard</a>
<?=$this->endSection()?>