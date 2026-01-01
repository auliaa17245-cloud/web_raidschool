<?php
// Ambil data identitas sekolah
include "get_identitas.php";

// Biar aman kalau ada index yang kosong
$nama_sekolah = isset($iden['nama']) ? $iden['nama'] : 'RAID SCHOOL';
$alamat       = isset($iden['alamat']) ? $iden['alamat'] : 'Alamat sekolah belum diisi';
$telp         = isset($iden['telp']) ? $iden['telp'] : '-';
$email        = isset($iden['email']) ? $iden['email'] : '-';
$website      = isset($iden['website']) ? $iden['website'] : '';
$deskripsi    = isset($iden['deskripsi']) ? $iden['deskripsi'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kontak - <?php echo htmlspecialchars($nama_sekolah); ?></title>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">

    <style>
        body{
            background: #f5f7fb;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }
        /* NAVBAR */
        .navbar-raidschool{
            background: #1c9b8e;
            border-radius: 0;
            border: 0;
            margin-bottom: 0;
        }
        .navbar-raidschool .navbar-brand,
        .navbar-raidschool .navbar-nav > li > a{
            color: #fff !important;
            font-weight: 500;
        }
        .navbar-raidschool .navbar-brand:hover,
        .navbar-raidschool .navbar-nav > li > a:hover{
            background: rgba(0,0,0,0.05) !important;
        }

        .page-header-custom{
            background: linear-gradient(135deg, #1c9b8e, #16b3a0);
            color: #fff;
            padding: 40px 0 30px 0;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,.15);
        }
        .page-header-custom h2{
            margin-top: 0;
            font-weight: 600;
        }
        .page-header-custom p{
            margin: 5px 0 0 0;
            opacity: .9;
        }

        .contact-wrapper{
            margin-bottom: 40px;
        }
        .card{
            background: #fff;
            border-radius: 6px;
            border: 1px solid #dde3ec;
            box-shadow: 0 1px 3px rgba(0,0,0,.06);
            padding: 20px;
            margin-bottom: 20px;
        }
        .card-title{
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: 600;
        }
        .form-control{
            border-radius: 4px;
            box-shadow: none;
            border-color: #ccd5e3;
        }
        .form-control:focus{
            border-color: #1c9b8e;
            box-shadow: 0 0 0 2px rgba(28,155,142,0.15);
        }
        .btn-raidschool{
            background: #1c9b8e;
            border-color: #1c9b8e;
            color: #fff;
            font-weight: 500;
            border-radius: 50px;
            padding-left: 20px;
            padding-right: 20px;
        }
        .btn-raidschool:hover{
            background: #17877b;
            border-color: #17877b;
            color: #fff;
        }
        .info-list{
            list-style: none;
            padding-left: 0;
            margin-bottom: 15px;
        }
        .info-list li{
            margin-bottom: 8px;
            font-size: 13px;
        }
        .info-list li span.glyphicon{
            width: 18px;
            margin-right: 5px;
            color: #1c9b8e;
        }
        .map-placeholder{
            border-radius: 4px;
            border: 1px dashed #c8d4e5;
            background: #f7fafc;
            padding: 15px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }

        footer{
            background: #1c9b8e;
            color: #fff;
            padding: 12px 0;
            font-size: 12px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- NAVBAR (sesuaikan dengan index.php kalau perlu) -->
<?php include "header.php"; ?>

<!-- HEADER -->
<div class="page-header-custom">
    <div class="container">
        <h2>Kontak <?php echo htmlspecialchars($nama_sekolah); ?></h2>
        <p>
            <?php
            if (!empty($deskripsi)) {
                echo htmlspecialchars($deskripsi);
            } else {
                echo "Silakan kirim pertanyaan, saran, atau pesan lain melalui form di bawah ini.";
            }
            ?>
        </p>
    </div>
</div>

<!-- CONTENT -->
<div class="container contact-wrapper">
    <div class="row">
        <!-- FORM KONTAK -->
        <div class="col-md-6">
            <div class="card">
                <h3 class="card-title">Form Kontak</h3>
                <form action="kirim_pesan.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                               placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Aktif</label>
                        <input type="email" name="email" id="email" class="form-control"
                               placeholder="Masukkan email" required>
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea name="pesan" id="pesan" class="form-control" rows="5"
                                  placeholder="Tulis pesan kamu di sini..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-raidschool">
                        <span class="glyphicon glyphicon-send"></span> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        <!-- INFO SEKOLAH -->
        <div class="col-md-6">
            <div class="card">
                <h3 class="card-title">Informasi Sekolah</h3>

                <ul class="info-list">
                    <li>
                        <span class="glyphicon glyphicon-home"></span>
                        <?php echo htmlspecialchars($nama_sekolah); ?>
                    </li>
                    <li>
                        <span class="glyphicon glyphicon-map-marker"></span>
                        <?php echo htmlspecialchars($alamat); ?>
                    </li>
                    <li>
                        <span class="glyphicon glyphicon-phone-alt"></span>
                        Telepon: <?php echo htmlspecialchars($telp); ?>
                    </li>
                    <li>
                        <span class="glyphicon glyphicon-envelope"></span>
                        Email: <?php echo htmlspecialchars($email); ?>
                    </li>
                    <?php if (!empty($website)) { ?>
                        <li>
                            <span class="glyphicon glyphicon-globe"></span>
                            Website:
                            <a href="<?php echo htmlspecialchars($website); ?>" target="_blank">
                                <?php echo htmlspecialchars($website); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>

                <div class="map-placeholder">
                   <strong>Maps / Lokasi</strong><br><br>

                      <iframe 
                         src="https://maps.app.goo.gl/g5Wx3NWEZDAyEqT9A"
                         width="100%" 
                         height="350" 
                         style="border:0;" 
                         allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                      </iframe>

                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container text-center">
        &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($nama_sekolah); ?>. All rights reserved.
    </div>
</footer>

<script src="bootstrap/bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>