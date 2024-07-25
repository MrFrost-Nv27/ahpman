<a href="#!" class="nav-close"><i class="material-icons">menu</i></a>
<div class="nav-header">
    <h1><b>MAN FakFak</b></h1>
</div>
<div class="nav-list">
    <div class="nav-item" data-page="dashboard">
        <a href="<?=base_url('panel')?>" class="nav-link"><i class="material-icons">dashboard</i>Dashboard</a>
    </div>
    <?php if (auth()->user()->inGroup('admin')): ?>
    <div class="nav-item" data-page="siswa">
        <a href="<?=base_url('panel/siswa')?>" class="nav-link"><i class="material-icons">people</i>Data Peserta
            Didik</a>
    </div>
    <div class="nav-item" data-page="kriteria">
        <a href="<?=base_url('panel/kriteria')?>" class="nav-link"><i
                class="material-icons">format_list_bulleted</i>Bobot Kriteria</a>
    </div>
    <div class="nav-item" data-page="nilai">
        <a href="<?=base_url('panel/nilai')?>" class="nav-link"><i class="material-icons">checklist</i>Data Nilai</a>
    </div>
    <div class="nav-item" data-page="perhitungan">
        <a href="<?=base_url('panel/perhitungan')?>" class="nav-link"><i class="material-icons">calculate</i>Hasil
            Perhitungan</a>
    </div>
    <?php endif?>
    <?php if (auth()->user()->inGroup('user')): ?>
    <div class="nav-item" data-page="profil">
        <a href="<?=base_url('panel/profil')?>" class="nav-link"><i class="material-icons">person</i>Data Peserta
            Didik</a>
    </div>
    <div class="nav-item" data-page="ujian">
        <a href="<?=base_url('panel/ujian')?>" class="nav-link"><i class="material-icons">assignment</i>Ujian Tes</a>
    </div>
    <div class="nav-item" data-page="pengumuman">
        <a href="<?=base_url('panel/pengumuman')?>" class="nav-link"><i
                class="material-icons">announcement</i>Pengumuman</a>
    </div>
    <?php endif?>
    <div class="nav-item">
        <a href="<?=base_url('logout')?>" class="nav-link btn-logout"><i class="material-icons">logout</i>Logout</a>
    </div>
</div>