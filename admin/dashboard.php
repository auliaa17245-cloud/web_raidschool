
<?php include 'header.php'; ?>
<div class="container">

    <!-- HEADER -->
    <div class="page-header">
        <h3>Halo, <?php echo $_SESSION['admin_nama']; ?> 👋</h3>
        <small>Selamat datang di panel admin SMKS RAID SCHOOL.</small>
    </div>

    <!-- KOTAK MENU CEPAT -->
    <div class="row">

        <div class="col-sm-6 col-md-3">
            <div class="panel panel-default panel-dashboard">
                <div class="panel-heading">
                    <span class="icon-big glyphicon glyphicon-education"></span>
                    <strong>Data Siswa</strong>
                </div>
                <div class="panel-body">
                    <p>Kelola data siswa, akun login, dan informasi kelas.</p>
                    <a href="siswa.php" class="btn btn-success btn-sm btn-block">Kelola Siswa</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="panel panel-default panel-dashboard">
                <div class="panel-heading">
                    <span class="icon-big glyphicon glyphicon-user"></span>
                    <strong>Data Guru</strong>
                </div>
                <div class="panel-body">
                    <p>Atur data guru, mapel yang diajar, dan kontak.</p>
                    <a href="guru.php" class="btn btn-success btn-sm btn-block">Kelola Guru</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="panel panel-default panel-dashboard">
                <div class="panel-heading">
                    <span class="icon-big glyphicon glyphicon-th-large"></span>
                    <strong>Program Keahlian</strong>
                </div>
                <div class="panel-body">
                    <p>Tambah/edit jurusan yang tampil di halaman Program Keahlian.</p>
                    <a href="jurusan_admin.php" class="btn btn-success btn-sm btn-block">Kelola Program</a>
                </div>
            </div>
        </div>

          <div class="col-sm-6 col-md-3">
            <div class="panel panel-default panel-dashboard">
                <div class="panel-heading">
                    <span class="icon-big glyphicon glyphicon-th-large"></span>
                    <strong>Jadwal Admin</strong>
                </div>
                <div class="panel-body">
                    <p>Tambah/edit jadwal mata pelajaran.</p>
                    <a href="jadwal_admin.php" class="btn btn-success btn-sm btn-block">Kelola Program</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="panel panel-default panel-dashboard">
                <div class="panel-heading">
                    <span class="icon-big glyphicon glyphicon-home"></span>
                    <strong>Identitas Sekolah</strong>
                </div>
                <div class="panel-body">
                    <p>Atur nama sekolah, alamat, logo, dan informasi utama lainnya.</p>
                    <a href="identitas.php" class="btn btn-success btn-sm btn-block">Atur Identitas</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="panel panel-default panel-dashboard">
                <div class="panel-heading">
                    <span class="icon-big glyphicon glyphicon-envelope"></span>
                    <strong>Pesan Kontak</strong>
                </div>
                <div class="panel-body">
                    <p>Lihat pesan yang dikirim dari form kontak di website.</p>
                    <a href="pesan.php" class="btn btn-success btn-sm btn-block">Lihat Pesan</a>
                </div>
            </div>
        </div>

    </div>

</div>

<?php include 'footer.php'; ?>