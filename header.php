<?php include "get_identitas.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $iden['nama']; ?></title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">

    <style>
        body{
            background:#f9fafc;
            font-family: "Helvetica", Arial, sans-serif;
        }
        .navbar{
            border-radius:0;
            border:none;
            box-shadow:0 2px 8px rgba(0,0,0,.05);
        }
        .navbar-brand{
            font-weight:bold;
            letter-spacing:1px;
        }
        .hero{
            padding:70px 0 60px;
        }
      
        .btn-hero{
            padding:12px 30px;
            font-size:15px;
            border-radius:30px;
        }
        .hero-badge{
            display:inline-block;
            padding:8px 18px;
            border-radius:30px;
            background:#fff;
            box-shadow:0 4px 15px rgba(0,0,0,.06);
            margin-top:15px;
            font-size:13px;
        }
        .hero-img{
            max-width:100%;
        }
        .section-title{
            text-align:center;
            margin-bottom:35px;
        }
        .section-title h3{
            font-weight:700;
        }
        .category-pill{
            display:inline-block;
            padding:10px 20px;
            margin:5px;
            border-radius:25px;
            background:#fff;
            box-shadow:0 2px 8px rgba(0,0,0,.05);
            font-size:13px;
        }
        .program-card{
            background:#fff;
            border-radius:10px;
            box-shadow:0 4px 12px rgba(0,0,0,.06);
            margin-bottom:25px;
            overflow:hidden;
        }
        .program-card img{
            width:100%;
            height:160px;
            object-fit:cover;
        }
        .program-body{
            padding:15px;
        }
        .program-title{
            font-weight:600;
            margin-bottom:5px;
        }
        .program-footer{
            padding:12px 15px;
            border-top:1px solid #f1f1f1;
            font-size:12px;
            color:#777;
        }
        footer{
            padding:20px 0;
            margin-top:40px;
            background:#fff;
            text-align:center;
            font-size:13px;
            color:#777;
        }
        .navbar-default .navbar-nav>li>a,
        .navbar-default .navbar-brand {
            color:white !important;
            font-weight: bold;
        }
        .navbar-default .navbar-nav>li>a:hover {
            background:white;
            color:#0d8a43 !important;
        }
        .logo-header{
            height:32px;
            margin-top:-7px;
            margin-right:6px;
            border-radius:4px;

    
        }

        .navbar-brand{
            font-weight:bold;
            letter-spacing:1px;
            display:flex;
            align-items:center;
        }

        .logo-header{
            height:32px;
            margin-right:8px;
            border-radius:4px;
        }

        .navbar-default .navbar-nav>li>a,
        .navbar-default .navbar-brand {
            color:white !important;
            font-weight: bold;
        }

        .navbar-default .navbar-nav>li>a:hover {
            background:white;
            color:#0d8a43 !important;
        }

        .marquee-bar{
            background:#93e9be;
            padding:8px 0;
            border-top:1px solid rgba(0,0,0,.05);
            border-bottom:1px solid rgba(0,0,0,.05);
        }

        .marquee-bar marquee{
            font-size:14px;
            font-weight:bold;
            color:#0d8a43;
        }
        
        .facility-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 6px;
        }

        .facility-card {
            margin-bottom: 25px;
            text-align: center;
        }

        .navbar-fixed {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999; /* Biar selalu di atas elemen lain */
        }
        body {
            padding-top: 70px; /* Sesuaikan tinggi navbar kamu */
        }

  .hero-full {
  position: relative;
  background-image: url("assets/img/sekolah.jpeg"); /* GANTI NAMA FILE FOTO SEKOLAH */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  min-height: 70vh;
  display: flex;
  align-items: center;
  color: #fff;
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.35);
  z-index: 1;
}

/* Hero Content Positioning */
.hero-content {
    position: relative;
    z-index: 2;
    max-width: 600px;         /* biar rapi tidak melebar */
    text-align: left;         /* rata kiri */
    margin-left: 40px;        /* jarak manis dari pinggir kiri */
    padding-top: 40px;
    padding-bottom: 40px;
}

/* Title */
.hero-title {
    font-size: 48px;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 10px;
    text-shadow: 0 3px 8px rgba(0,0,0,0.60);
}

/* Subtitle */
.hero-subtitle {
    font-size: 20px;
    margin-bottom: 18px;
    font-weight: 500;
    text-shadow: 0 2px 5px rgba(0,0,0,0.45);
}

/* Description */
.hero-desc {
    font-size: 15px;
    line-height: 1.6;
    max-width: 540px;
    margin-bottom: 20px;
    color: #f0f0f0;
    text-shadow: 0 2px 5px rgba(0,0,0,0.6);
}

/* Tombol */
.btn-cta {
    padding: 12px 26px;
    border-radius: 40px;
    font-size: 15px;
    font-weight: 600;
    background: #28b47d;
    border: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

.btn-cta:hover {
    background: #1f9c6a;
    transform: translateY(-2px);
}

/* Facility cards */
.facility-card {
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 6px 18px rgba(0,0,0,0.08);
  display: flex;
  flex-direction: column;
  height: 100%;               /* penting supaya semua col sama tinggi */
}

.facility-img {
  width: 100%;
  height: 180px;              /* atur tinggi gambar seragam */
  overflow: hidden;
}

.facility-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;          /* menjaga aspek rasio + crop rapi */
  display: block;
}

.facility-body {
  padding: 16px;
  flex: 1;                    /* bikin body mengisi sisa tinggi */
  display: flex;
  flex-direction: column;
}

.facility-body h4 {
  margin: 0 0 8px;
  font-size: 18px;
  font-weight: 600;
}

.facility-body p {
  margin: 0;
  color: #666;
  font-size: 14px;
  line-height: 1.5;
  margin-top: auto;           /* dorong paragraf ke bawah jika perlu */
}
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed" style="background:#03ab99; border:none; box-shadow:0 2px 4px rgba(0,0,0,.1);">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navRaid">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.php">
                <?php if (!empty($iden['logo'])) { ?>
                    <img src="<?php echo $iden['logo']; ?>" class="logo-header">
                <?php } ?>
                <span><?php echo $iden['nama']; ?></span>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navRaid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Beranda</a></li>
                <li><a href="profil.php">Profil Sekolah</a></li>
                <li><a href="program.php">Program Keahlian</a></li>
                <li><a href="guru.php">Data Guru</a></li>
                <li><a href="fasilitas.php">Fasilitas</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="kontak.php">Kontak</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>