<?php
session_start();
include "../koneksi.php";

$success = "";
$error = "";

// =========================
// Ambil data identitas
// =========================
try {
    $stmt = $conn->prepare("SELECT * FROM identitas LIMIT 1");
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika belum ada → buat default
    if (!$data) {
        $conn->exec("
            INSERT INTO identitas (nama, alamat, telp, email, website, deskripsi, logo)
            VALUES ('','','','','','','')
        ");

        $stmt = $conn->prepare("SELECT * FROM identitas LIMIT 1");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    }

} catch (PDOException $e) {
    die("Gagal memuat data identitas: " . $e->getMessage());
}

// =========================
// SIMPAN DATA
// =========================
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id        = $data['id'];
    $nama      = $_POST['nama'];
    $alamat    = $_POST['alamat'];
    $telp      = $_POST['telp'];
    $email     = $_POST['email'];
    $website   = $_POST['website'];
    $deskripsi = $_POST['deskripsi'];
    $logo_lama = $_POST['logo_lama'];

    $logo_db = $logo_lama;

    // Upload logo jika ada
    if (!empty($_FILES['logo']['name'])) {

        $folder = "../uploads/logo/";
        if (!is_dir($folder)) mkdir($folder, 0777, true);

        $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $newname = "logo_" . time() . "." . $ext;

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $folder . $newname)) {

            if (!empty($logo_lama) && file_exists("../" . $logo_lama)) {
                unlink("../" . $logo_lama);
            }

            $logo_db = "uploads/logo/" . $newname;
        } else {
            $error = "Upload logo gagal!";
        }
    }

    if (empty($error)) {
        try {
            $stmt = $conn->prepare("
                UPDATE identitas SET
                    nama      = :nama,
                    alamat    = :alamat,
                    telp      = :telp,
                    email     = :email,
                    website   = :website,
                    deskripsi = :deskripsi,
                    logo      = :logo
                WHERE id = :id
            ");

            $stmt->execute([
                ':nama'      => $nama,
                ':alamat'    => $alamat,
                ':telp'      => $telp,
                ':email'     => $email,
                ':website'   => $website,
                ':deskripsi' => $deskripsi,
                ':logo'      => $logo_db,
                ':id'        => $id
            ]);

            $success = "Identitas sekolah berhasil diperbarui!";

            $stmt = $conn->prepare("SELECT * FROM identitas LIMIT 1");
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            $error = "Gagal memperbarui data: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Identitas Sekolah</title>

    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">

    <style>
        body{ background:#eef2f3; }
        .navbar-custom{ background:#1c9b8e !important; border:none; border-radius:0; }
        .navbar-custom a{ color:white !important; font-weight:500; }
        .container-box{ margin-top:30px; }
        .card{
            background:white;
            border-radius:10px;
            padding:25px;
            box-shadow:0 2px 10px rgba(0,0,0,0.08);
        }
        .section-title{ font-size:20px; font-weight:600; color:#1c9b8e; margin-bottom:20px; }
        .logo-preview{
            max-height:140px; border-radius:8px; border:1px solid #ddd;
            padding:5px; background:white;
        }
        footer{
            text-align:center; margin-top:40px;
            padding:15px; background:white; border-top:1px solid #ddd;
        }
        .btn-primary-custom{
            background:#1c9b8e; border:none;
            padding:10px 20px; border-radius:6px;
        }
        .btn-primary-custom:hover{ background:#157f74; }
    </style>
</head>

<body>

<nav class="navbar navbar-default navbar-custom">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand">RAID SCHOOL - Admin</a>
        </div>

        <ul class="nav navbar-nav">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="siswa.php">Data Siswa</a></li>
            <li><a href="guru.php">Data Guru</a></li>
            <li><a href="jurusan_admin.php">Program Keahlian</a></li>
            <li class="active"><a href="identitas.php">Identitas Sekolah</a></li>
            <li><a href="pesan.php">Pesan Kontak</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container container-box">

    <div class="card">

        <h3 class="section-title">Identitas Sekolah</h3>

        <?php if ($success): ?>
            <div class="alert alert-success"><?= $success; ?></div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">

            <input type="hidden" name="logo_lama" value="<?= $data['logo']; ?>">

            <div class="form-group">
                <label>Nama Sekolah</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required><?= $data['alamat']; ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>Telepon</label>
                    <input type="text" name="telp" class="form-control" value="<?= $data['telp']; ?>">
                </div>

                <div class="col-md-4">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $data['email']; ?>">
                </div>

                <div class="col-md-4">
                    <label>Website</label>
                    <input type="text" name="website" class="form-control" value="<?= $data['website']; ?>">
                </div>
            </div>

            <br>

            <div class="form-group">
                <label>Deskripsi Sekolah</label>
                <textarea name="deskripsi" class="form-control" rows="4"><?= $data['deskripsi']; ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Upload Logo</label>
                    <input type="file" name="logo" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak mengganti logo.</small>
                </div>

                <div class="col-md-6">
                    <label>Preview Logo</label><br>
                    <?php if (!empty($data['logo'])): ?>
                        <img src="../<?= $data['logo']; ?>" class="logo-preview">
                    <?php else: ?>
                        <p class="text-muted">Belum ada logo</p>
                    <?php endif; ?>
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-primary-custom">
                Simpan Identitas
            </button>

        </form>
    </div>

</div>

<footer>
    © <?= date('Y'); ?> SMKS RAID SCHOOL — Admin Panel
</footer>

</body>
</html>
