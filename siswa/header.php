<?php
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
if (!isset($_SESSION['login_status']) || $_SESSION['login_role'] != 'siswa') {
    header("Location: ../login.php");
    exit;
}


$siswa_name = htmlspecialchars($_SESSION['user_nama'] ?? 'Siswa');
$kelas      = trim($_SESSION['kelas'] ?? '');
$active     = $active ?? '';
?>
<link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
<style>
/* header custom */
.topbar { background:#2E7D74; color:#fff; border-radius:0; box-shadow: 0 1px 0 rgba(0,0,0,0.06); }
.navbar-brand img { height:34px; display:inline-block; margin-right:8px; }
.site-title { font-weight:600; color:#fff; margin:0; font-size:18px; display:inline-block; vertical-align:middle; }
.navbar-default .navbar-nav>li>a { color:#e9f7f6; }
.navbar-default .navbar-nav>li.active>a,
.navbar-default .navbar-nav>li>a:hover { background: rgba(255,255,255,0.06); color:#fff; }
.header-cta { margin-top:6px; }
.badge-green { background:#37a07a; color:#fff; }
@media (max-width:767px){ .site-title{ font-size:16px } }
</style>

<nav class="navbar navbar-default topbar" role="navigation" style="margin-bottom:0;">
  <div class="container-fluid">
    <!-- Brand and toggle -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-main">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar" style="background:#fff"></span>
        <span class="icon-bar" style="background:#fff"></span>
        <span class="icon-bar" style="background:#fff"></span>
      </button>
      <a class="navbar-brand" href="../index.php" style="padding:10px 15px;">
        <img src="../uploads/logo/logo_1765366434.png" alt="logo" >
        <span class="site-title">SMKS RAID <small style="color:#dff3ef;font-weight:400;">SCHOOL</small></span>
      </a>
    </div>

    <!-- Nav links -->
    <div class="collapse navbar-collapse" id="nav-main">
      <ul class="nav navbar-nav">
        <li class="<?php echo $active=='dashboard'?'active':''; ?>"><a href="dashboard.php">Dashboard</a></li>
        <li class="<?php echo $active=='profil'?'active':''; ?>"><a href="profil.php">Profil</a></li>
        <li class="<?php echo $active=='jadwal'?'active':''; ?>"><a href="jadwal.php">Jadwal</a></li>
        <li class="<?php echo $active=='nilai'?'active':''; ?>"><a href="nilai.php">Nilai & Raport</a></li>
        <li class="<?php echo $active=='materi'?'active':''; ?>"><a href="materi.php">Materi</a></li>
        
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="hidden-xs">
          <p class="navbar-text header-cta" style="color:#fff;">Selamat datang, <strong><?php echo $siswa_name; ?></strong></p>
        </li>
        <li>
          <a href="../" target="_blank" style="color:#fff;"><span class="glyphicon glyphicon-globe"></span> Lihat Web</a>
        </li>
        <li>
          <a href="../logout.php" style="color:#fff;"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>