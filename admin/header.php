<?php
session_start();
if (!isset($_SESSION['login_status']) || $_SESSION['login_role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard Admin - SMKS RAID SCHOOL</title>

    <!-- Bootstrap 3.3.7 -->
     <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">

    <style>
        body{
            background:#f4f6fb;
        }
        .navbar{
            border-radius:0;
            border:none;
            box-shadow:0 2px 8px rgba(0,0,0,.08);
            background:#1c9b8e;
        }
        .navbar-default .navbar-brand,
        .navbar-default .navbar-nav>li>a{
            color:#fff !important;
            font-weight:bold;
        }
        .navbar-default .navbar-nav>li>a:hover{
            background:#fff;
            color:#1c9b8e !important;
        }
        .page-header{
            margin-top:80px;
            border-bottom:none;
        }
        .page-header h3{
            font-weight:700;
            margin-bottom:5px;
        }
        .page-header small{
            color:#6c757d;
        }
        .panel-dashboard{
            border-radius:10px;
            box-shadow:0 4px 15px rgba(0,0,0,.06);
            border:none;
            transition:all .2s;
        }
        .panel-dashboard:hover{
            transform:translateY(-3px);
            box-shadow:0 8px 20px rgba(0,0,0,.08);
        }
        .panel-dashboard .panel-heading{
            border-radius:10px 10px 0 0;
            background:#ffffff;
            border-bottom:none;
        }
        .panel-dashboard .icon-big{
            font-size:30px;
            margin-right:10px;
            color:#1c9b8e;
        }
        .panel-dashboard .panel-body p{
            color:#6c757d;
            min-height:40px;
        }
        footer{
            margin-top:30px;
            text-align:center;
            padding:15px;
            color:#777;
            font-size:13px;
        }
    </style>
</head>
<body>

<!-- NAVBAR ADMIN -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navAdmin">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php">RAID SCHOOL - Admin</a>
        </div>
        <div class="collapse navbar-collapse" id="navAdmin">
            <ul class="nav navbar-nav">
                <li class="active"><a href="dashboard.php">Dashboard</a></li>
                <li><a href="siswa.php">Data Siswa</a></li>
                <li><a href="guru.php">Data Guru</a></li>
                <li><a href="jurusan_admin.php">Program Keahlian</a></li>
                <li><a href="identitas.php">Identitas Sekolah</a></li>
                <li><a href="pesan.php">Pesan Kontak</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../index.php">Lihat Web</a></li>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>