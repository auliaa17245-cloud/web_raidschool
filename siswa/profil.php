<?php
// siswa/profil.php

include "header.php";          // Navbar + HTML awal
require_once "../koneksi.php"; // PDO

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = intval($_SESSION['user_id']);

try {
    $stmt = $conn->prepare("SELECT * FROM siswa WHERE id_siswa = :id LIMIT 1");
    $stmt->execute([':id' => $user_id]);
    $siswa = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $siswa = null;
}

// nilai default jika data tidak ditemukan
$nama    = $siswa['nama_siswa'] ?? 'Siswa';
$nis     = $siswa['nis'] ?? '-';
$kelas   = $siswa['kelas'] ?? '-';
$jurusan = $siswa['jurusan'] ?? '-';
?>

<style>
.profile-card {
  margin-top: 30px;
  padding: 24px;
  border: 1px solid #e6e6e6;
  border-radius: 6px;
  background: #fff;
  box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}

.meta-label {
  color:#666;
}

.profile-title{
  margin-top:20px;
  margin-bottom:10px;
  font-weight:600;
}
</style>

<div class="container">
  <h3 class="profile-title">Profil Siswa</h3>
  <hr>

  <div class="row">

    <!-- KOTAK KIRI -->
    <div class="col-md-4 col-sm-5">
      <div class="profile-card text-center">
        <h4 style="margin-top:5px; margin-bottom:4px;">
          <?= htmlspecialchars($nama); ?>
        </h4>

        <p class="text-muted" style="margin-bottom:10px;">
          <?= htmlspecialchars($jurusan); ?> · Kelas <?= htmlspecialchars($kelas); ?>
        </p>

        <a href="dashboard.php" class="btn btn-default btn-block">
          Kembali ke Dashboard
        </a>
      </div>
    </div>

    <!-- KOTAK KANAN -->
    <div class="col-md-8 col-sm-7">
      <div class="profile-card">

        <?php if ($siswa): ?>

          <div class="row">
            <div class="col-xs-4 meta-label"><strong>Nama</strong></div>
            <div class="col-xs-8"><?= htmlspecialchars($nama); ?></div>
          </div>
          <hr style="margin:8px 0">

          <div class="row">
            <div class="col-xs-4 meta-label"><strong>NIS</strong></div>
            <div class="col-xs-8"><?= htmlspecialchars($nis); ?></div>
          </div>
          <hr style="margin:8px 0">

          <div class="row">
            <div class="col-xs-4 meta-label"><strong>Kelas</strong></div>
            <div class="col-xs-8"><?= htmlspecialchars($kelas); ?></div>
          </div>
          <hr style="margin:8px 0">

          <div class="row">
            <div class="col-xs-4 meta-label"><strong>Jurusan</strong></div>
            <div class="col-xs-8"><?= htmlspecialchars($jurusan); ?></div>
          </div>

        <?php else: ?>

          <div class="alert alert-warning">
            Data siswa tidak ditemukan. Silakan hubungi admin.
          </div>

        <?php endif; ?>

      </div>
    </div>

  </div>
</div>

<?php include "../footer.php"; ?>
