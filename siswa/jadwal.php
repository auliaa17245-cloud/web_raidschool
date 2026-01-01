<?php
// siswa/jadwal.php
session_start();
include "../koneksi.php";   // pastikan sudah PDO
$active = 'jadwal';

$kelas = trim($_SESSION['kelas'] ?? '');

// ==============================
// Fallback: ambil kelas dari DB
// ==============================
if (empty($kelas) && isset($_SESSION['user_id'])) {
    $id = intval($_SESSION['user_id']);

    try {
        $stmt = $conn->prepare("SELECT kelas, nama_siswa FROM siswa WHERE id_siswa = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        $info = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($info) {
            $kelas = trim($info['kelas'] ?? '');
            $siswa_name = htmlspecialchars($info['nama_siswa'] ?? $_SESSION['user_nama']);
        }
    } catch (PDOException $e) {
        $kelas = '';
    }
}

$days = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Jadwal Pelajaran</title>
<link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
<style>
body { background:#f6f9f8; }
.container { margin-top:40px; padding-bottom:40px; }
.panel-card { background:#fff; padding:18px; border-radius:8px; box-shadow:0 8px 30px rgba(36,93,84,0.04); }
.tab-pane { padding-top:8px; }
.tb-jadwal th{ background:#f7f7f7; }
.no-kelas { padding:18px; background:#fff; border-radius:8px; }
</style>
</head>
<body>

<?php include "header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel-card">

        <div class="row">
          <div class="col-sm-8">
            <h3 style="margin-top:0;">
              Jadwal Pelajaran 
              <?= $kelas ? "(Kelas ".htmlspecialchars($kelas).")" : '' ?>
            </h3>
            <p class="text-muted">Cek jadwal harian supaya nggak ketinggalan pelajaran.</p>
          </div>

          <div class="col-sm-4 text-right hidden-xs">
            <div class="btn-group">
              <a href="profil.php" class="btn btn-default">Profil</a>
              <a href="nilai.php" class="btn btn-success">Nilai</a>
            </div>
          </div>
        </div>

        <?php if (!$kelas): ?>
          <div class="no-kelas">
            <div class="alert alert-info">
              Belum ada kelas terdaftar di akun kamu. Hubungi admin untuk melengkapi data kelas.
            </div>
          </div>

        <?php else: ?>

          <ul class="nav nav-tabs" role="tablist" style="margin-top:12px;">
            <?php foreach($days as $i=>$d): ?>
              <li class="<?= $i==0?'active':''; ?>">
                  <a href="#d<?= $i; ?>" data-toggle="tab"><?= $d; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>

          <div class="tab-content" style="margin-top:12px;">
            <?php foreach($days as $i=>$d): ?>
              <div class="tab-pane <?= $i==0?'active':''; ?>" id="d<?= $i; ?>">

                <?php
                try {
                    $stmt = $conn->prepare("
                        SELECT hari, jam_mulai, jam_selesai, mapel, guru 
                        FROM jadwal 
                        WHERE kelas LIKE CONCAT('%', :kelas, '%')
                          AND hari = :hari
                        ORDER BY jam_mulai
                    ");

                    $stmt->execute([
                        ':kelas' => $kelas,
                        ':hari'  => $d
                    ]);

                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (!$rows) {
                        echo "<div class='alert alert-warning'>Belum ada jadwal untuk $d.</div>";
                    } else {
                        echo "<table class='table table-striped tb-jadwal'>
                                <thead>
                                  <tr>
                                    <th>Jam</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Guru</th>
                                  </tr>
                                </thead>
                                <tbody>";
                        foreach($rows as $row){
                            echo "<tr>
                                <td>".htmlspecialchars($row['jam_mulai'])." - ".htmlspecialchars($row['jam_selesai'])."</td>
                                <td>".htmlspecialchars($row['mapel'])."</td>
                                <td>".htmlspecialchars($row['guru'])."</td>
                            </tr>";
                        }
                        echo "</tbody></table>";
                    }

                } catch (PDOException $e) {
                    echo "<div class='alert alert-danger'>Terjadi kesalahan query. Hubungi admin.</div>";
                }
                ?>

              </div>
            <?php endforeach; ?>
          </div>

        <?php endif; ?>

      </div>

      <div style="margin-top:12px;">
        <a href="dashboard.php" class="btn btn-default">Kembali</a>
      </div>

    </div>
  </div>
</div>

<script src="../bootstrap/bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
