<?php
include "../koneksi.php";
// include "cek_session.php";

if (!isset($_GET['id'])) {
    echo "<script>
            alert('Pesan tidak ditemukan.');
            window.location='pesan_kontak.php';
          </script>";
    exit;
}

$id = (int) $_GET['id'];

try {
    $stmt = $conn->prepare("SELECT * FROM pesan_kontak WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

if (!$data) {
    echo "<script>
            alert('Pesan tidak ditemukan.');
            window.location='pesan_kontak.php';
          </script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Pesan - RAID SCHOOL</title>

    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">

    <style>
        body{
            background: #eef2f7;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }
        .page-wrapper{
            margin-top: 25px;
        }
        .page-title{
            margin-top: 0;
            margin-bottom: 5px;
            font-weight: 600;
        }
        .page-subtitle{
            color: #777;
            margin-bottom: 20px;
        }
        .card{
            background: #ffffff;
            border-radius: 6px;
            border: 1px solid #dde3ec;
            box-shadow: 0 1px 3px rgba(0,0,0,.06);
            padding: 20px;
        }
        .card-header{
            padding-bottom: 10px;
            border-bottom: 1px solid #eef1f7;
            margin-bottom: 15px;
        }
        .card-header-icon{
            display: inline-block;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #1c9b8e;
            text-align: center;
            line-height: 36px;
            color: #fff;
            margin-right: 8px;
            font-size: 18px;
        }
        .card-header-title{
            font-size: 18px;
            font-weight: 600;
            vertical-align: middle;
        }
        .meta-row{
            margin-bottom: 6px;
            font-size: 13px;
        }
        .meta-label{
            display: inline-block;
            width: 80px;
            font-weight: 600;
            color: #555;
        }
        .meta-value{
            color: #333;
        }
        .meta-email{
            font-size: 12px;
            display: inline-block;
            padding: 3px 8px;
            background: #f4f7fb;
            border-radius: 50px;
            border: 1px solid #d3dbea;
        }
        .pesan-box{
            margin-top: 15px;
            padding: 15px;
            border-radius: 4px;
            background: #f7fafc;
            border: 1px dashed #c8d4e5;
            font-size: 13px;
            line-height: 1.6;
            white-space: pre-wrap;
        }
        .btn-rounded{
            border-radius: 50px;
            padding-left: 15px;
            padding-right: 15px;
        }
    </style>
</head>
<body>

<div class="container page-wrapper">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h3 class="page-title">Detail Pesan Kontak</h3>
            <p class="page-subtitle">
                Berikut adalah detail pesan yang dikirim melalui form kontak website.
            </p>

            <div class="card">
                <div class="card-header">
                    <span class="card-header-icon">
                        <span class="glyphicon glyphicon-user"></span>
                    </span>
                    <span class="card-header-title">
                        <?= htmlspecialchars($data['nama']); ?>
                    </span>
                </div>

                <div class="meta-row">
                    <span class="meta-label">Nama</span>
                    <span class="meta-value">
                        <?= htmlspecialchars($data['nama']); ?>
                    </span>
                </div>

                <div class="meta-row">
                    <span class="meta-label">Email</span>
                    <span class="meta-value meta-email">
                        <?= htmlspecialchars($data['email']); ?>
                    </span>
                </div>

                <div class="meta-row">
                    <span class="meta-label">Tanggal</span>
                    <span class="meta-value">
                        <?= date('d-m-Y H:i', strtotime($data['tanggal'])); ?>
                    </span>
                </div>

                <div class="pesan-box">
                    <?= nl2br(htmlspecialchars($data['pesan'])); ?>
                </div>

                <hr>
                <div class="text-right">
                    <a href="pesan.php" class="btn btn-default btn-rounded">
                        <span class="glyphicon glyphicon-chevron-left"></span> Kembali
                    </a>
                    <a href="pesan_kontak_hapus.php?id=<?= $data['id']; ?>"
                       class="btn btn-danger btn-rounded"
                       onclick="return confirm('Yakin ingin menghapus pesan ini?');">
                        <span class="glyphicon glyphicon-trash"></span> Hapus
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="../bootstrap/bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
