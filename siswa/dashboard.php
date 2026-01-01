<?php
session_start();
include "../koneksi.php";
include "../get_identitas.php";

// ambil identitas sekolah
$nama_sekolah = isset($iden['nama']) ? $iden['nama'] : 'RAID SCHOOL';

// ambil nama siswa dari session (sesuaikan kalau beda)
$nama_siswa = 'Siswa';
if (isset($_SESSION['nama_siswa']) && $_SESSION['nama_siswa'] != '') {
    $nama_siswa = $_SESSION['nama_siswa'];
} elseif (isset($_SESSION['username']) && $_SESSION['username'] != '') {
    $nama_siswa = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard Siswa - <?php echo htmlspecialchars($nama_sekolah); ?></title>

    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">

    <style>
        body{
            background: #eef2f7;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }
        .navbar-siswa{
            background: #1c9b8e;
            border-radius: 0;
            border: none;
            margin-bottom: 0;
        }
        .navbar-siswa .navbar-brand,
        .navbar-siswa .navbar-nav > li > a{
            color: #fff !important;
            font-weight: 500;
        }
        .navbar-siswa .navbar-nav > li > a:hover,
        .navbar-siswa .navbar-brand:hover{
            background: rgba(0,0,0,.05) !important;
        }

        .page-header-box{
            background: #ffffff;
            padding: 20px;
            margin-top: 20px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #dde3ec;
            box-shadow: 0 1px 3px rgba(0,0,0,.06);
        }
        .page-title{
            margin-top: 0;
            font-size: 22px;
            font-weight: 600;
        }
        .page-subtitle{
            color: #777;
            margin-bottom: 0;
        }
        .halo-emoji{
            font-size: 24px;
            margin-left: 5px;
        }

        .card-menu{
            background: #ffffff;
            border-radius: 6px;
            border: 1px solid #dde3ec;
            box-shadow: 0 1px 3px rgba(0,0,0,.06);
            padding: 18px 18px 15px 18px;
            margin-bottom: 15px;
            transition: all .15s ease;
            height: 150px;
        }
        .card-menu:hover{
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,.10);
        }
        .card-icon{
            font-size: 30px;
            color: #1c9b8e;
            margin-bottom: 10px;
        }
        .card-title{
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .card-desc{
            font-size: 12px;
            color: #777;
            min-height: 35px;
        }
        .btn-card{
            margin-top: 8px;
            border-radius: 50px;
            padding: 4px 14px;
            font-size: 12px;
        }
        .footer-text{
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 11px;
            color: #999;
            text-align: center;
        }

        .card-menu{
    background: #ffffff;
    border-radius: 6px;
    border: 1px solid #dde3ec;
    box-shadow: 0 1px 3px rgba(0,0,0,.06);
    padding: 18px;
    margin-bottom: 15px;
    transition: all .15s ease;
    height: 180px;

    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-icon{
    font-size: 32px;
    color: #1c9b8e;
}

.card-title{
    font-size: 16px;
    font-weight: 600;
    margin-top: 10px;
    margin-bottom: 5px;
}

.card-desc{
    font-size: 12px;
    color: #777;
    flex-grow: 1;
    margin-bottom: 10px;
}

.btn-card{
    align-self: flex-start;
    border-radius: 50px;
    padding: 5px 18px;
    font-size: 12px;
}
    </style>
</head>
<body>

<nav class="navbar navbar-siswa">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-siswa">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php">
        
                Siswa Panel - <?php echo htmlspecialchars($nama_sekolah); ?>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="nav-siswa">
            <ul class="nav navbar-nav">
                <li class="active"><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="nilai.php">Nilai</a></li>
                <li><a href="jadwal.php">Jadwal</a></li>
             
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../index.php">Lihat Web</a></li>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <!-- header halo -->
    <div class="page-header-box">
        <h3 class="page-title">
            Halo, <?php echo htmlspecialchars($nama_siswa); ?>
            <span class="halo-emoji">👋</span>
        </h3>
        <p class="page-subtitle">
            Selamat datang di panel siswa <?php echo htmlspecialchars($nama_sekolah); ?>.
            Di sini kamu bisa melihat informasi pribadi, jadwal pelajaran, nilai, dan pengumuman terbaru.
        </p>
    </div>

    <!-- menu kartu -->
    <div class="row">

        <!-- Profil Siswa -->
        <div class="col-sm-6 col-md-4">
            <div class="card-menu">
                <div class="card-icon">
                    <span class="glyphicon glyphicon-user"></span>
                </div>
                <div class="card-title">Profil Siswa</div>
                <div class="card-desc">
                    Lihat data diri, kelas, dan informasi akunmu. Pastikan semua data sudah benar.
                </div>
                <a href="profil.php" class="btn btn-success btn-card">Lihat Profil</a>
            </div>
        </div>

        <!-- Jadwal Pelajaran -->
        <div class="col-sm-6 col-md-4">
            <div class="card-menu">
                <div class="card-icon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </div>
                <div class="card-title">Jadwal Pelajaran</div>
                <div class="card-desc">
                    Cek jadwal pelajaran harianmu agar tidak tertinggal materi.
                </div>
                <a href="jadwal.php" class="btn btn-success btn-card">Lihat Jadwal</a>
            </div>
        </div>

        <!-- Nilai & Raport -->
        <div class="col-sm-6 col-md-4">
            <div class="card-menu">
                <div class="card-icon">
                    <span class="glyphicon glyphicon-list-alt"></span>
                </div>
                <div class="card-title">Nilai & Raport</div>
                <div class="card-desc">
                    Lihat nilai tugas, ulangan, ujian, dan rekap raport semester.
                </div>
                <a href="nilai.php" class="btn btn-success btn-card">Lihat Nilai</a>
            </div>
        </div>

        <!-- Materi / Download -->
        <div class="col-sm-6 col-md-4">
            <div class="card-menu">
                <div class="card-icon">
                    <span class="glyphicon glyphicon-book"></span>
                </div>
                <div class="card-title">Materi Belajar</div>
                <div class="card-desc">
                    Tempat guru mengunggah materi, tugas, atau file pendukung pembelajaran.
                </div>
                <a href="materi.php" class="btn btn-success btn-card">Buka Materi</a>
            </div>
        </div>
        

    <div class="footer-text">
        &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($nama_sekolah); ?> &mdash; Panel Siswa.
    </div>
</div>

<script src="../bootstrap/bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>