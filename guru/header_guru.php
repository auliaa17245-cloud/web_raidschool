<?php
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
if (!isset($_SESSION['login_status']) || $_SESSION['login_role'] != 'guru') {
    header("Location: ../login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Guru Panel - SMKS RAID SCHOOL</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        body {
            background: #f2f6f7;
        }
        .navbar {
            background: #0d5e4a;
            border-radius: 0;
            border: none;
        }
        .navbar-brand, .navbar-nav>li>a {
            color: white !important;
            font-weight: 600;
        }
        .navbar-brand:hover, 
        .navbar-nav>li>a:hover {
            color: #d9ffea !important;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">

        <div class="navbar-header">
            <a class="navbar-brand" href="dashboard.php">
                Guru Panel - SMKS RAID SCHOOL
            </a>
        </div>

        <div class="collapse navbar-collapse" id="nav-main">
      <ul class="nav navbar-nav">
        <li class="<?php echo $active=='dashboard'?'active':''; ?>"><a href="dashboard.php">Dashboard</a></li>
        <li class="<?php echo $active=='input_nilai'?'active':''; ?>"><a href="input_nilai.php">Input Nilai</a></li>
        <li class="<?php echo $active=='materi_ajar'?'active':''; ?>"><a href="materi_ajar.php">Materi Ajar</a></li>
      </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="../index.php" target="_blank">Lihat Web</a></li>
            <li><a href="../logout_guru.php">Logout</a></li>
        </ul>

    </div>
</nav>