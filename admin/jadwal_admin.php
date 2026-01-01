<?php
// raid/admin/jadwal_admin.php (PDO Version)
session_start();
include "../koneksi.php";

$errors = [];
$success = "";
$days_opt = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

// ==============================
// TAMBAH JADWAL
// ==============================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {

    $kelas       = trim($_POST['kelas'] ?? '');
    $hari        = trim($_POST['hari'] ?? '');
    $jam_mulai   = trim($_POST['jam_mulai'] ?? '');
    $jam_selesai = trim($_POST['jam_selesai'] ?? '');
    $mapel       = trim($_POST['mapel'] ?? '');
    $guru        = trim($_POST['guru'] ?? '');

    if ($kelas === '') $errors[] = "Kelas harus diisi.";
    if ($hari === '')  $errors[] = "Hari harus diisi.";
    if ($mapel === '') $errors[] = "Mata pelajaran harus diisi.";

    if (empty($errors)) {
        try {
            $stmt = $conn->prepare("
                INSERT INTO jadwal (kelas, hari, jam_mulai, jam_selesai, mapel, guru)
                VALUES (:kelas, :hari, :jm, :js, :mapel, :guru)
            ");

            $stmt->execute([
                ':kelas' => $kelas,
                ':hari'  => $hari,
                ':jm'    => $jam_mulai,
                ':js'    => $jam_selesai,
                ':mapel' => $mapel,
                ':guru'  => $guru
            ]);

            header("Location: jadwal_admin.php?msg=added");
            exit;

        } catch (PDOException $e) {
            $errors[] = "Gagal menyimpan jadwal: " . $e->getMessage();
        }
    }
}

// ==============================
// HAPUS JADWAL
// ==============================
if (isset($_GET['delete_id'])) {
    $did = intval($_GET['delete_id']);

    try {
        $stmt = $conn->prepare("DELETE FROM jadwal WHERE id = :id");
        $stmt->execute([':id' => $did]);

        header("Location: jadwal_admin.php?msg=deleted");
        exit;

    } catch (PDOException $e) {
        $errors[] = "Gagal menghapus jadwal: " . $e->getMessage();
    }
}

// ==============================
// TAMPILKAN DATA
// ==============================
try {
    $res = $conn->query("
        SELECT * FROM jadwal 
        ORDER BY 
            kelas,
            FIELD(hari,'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'),
            jam_mulai
    ");
    $jadwal = $res->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Gagal mengambil data jadwal: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin - Kelola Jadwal</title>
<link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
<style>
.container { margin-top:20px; }
.card { background:#fff; padding:18px; border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,0.04); }
.table th { background:#f7f7f7; }
</style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      <div class="card">
        <h3 style="margin-top:0;">Kelola Jadwal Pelajaran</h3>

        <?php if (!empty($errors)): ?>
          <div class="alert alert-danger">
            <ul style="margin:0;">
              <?php foreach($errors as $e) echo "<li>".htmlspecialchars($e)."</li>"; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php if (isset($_GET['msg']) && $_GET['msg'] === 'added'): ?>
          <div class="alert alert-success">Jadwal berhasil ditambahkan.</div>
        <?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
          <div class="alert alert-success">Jadwal berhasil dihapus.</div>
        <?php endif; ?>

        <!-- Form tambah -->
        <form method="post" class="form-inline" style="margin-bottom:18px;">
          <input type="hidden" name="action" value="add">

          <div class="form-group" style="margin-right:8px;">
            <input class="form-control" name="kelas" placeholder="Kelas (X / XI / XII)" style="width:130px;" required>
          </div>

          <div class="form-group" style="margin-right:8px;">
            <select name="hari" class="form-control" required>
              <option value="">Pilih Hari</option>
              <?php foreach($days_opt as $d): ?>
                <option value="<?= $d; ?>"><?= $d; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group" style="margin-right:8px;">
            <input class="form-control" name="jam_mulai" placeholder="Jam Mulai (07:00)" style="width:120px;">
          </div>

          <div class="form-group" style="margin-right:8px;">
            <input class="form-control" name="jam_selesai" placeholder="Jam Selesai (08:30)" style="width:120px;">
          </div>

          <div class="form-group" style="margin-right:8px;">
            <input class="form-control" name="mapel" placeholder="Mata Pelajaran" style="width:200px;" required>
          </div>

          <div class="form-group" style="margin-right:8px;">
            <input class="form-control" name="guru" placeholder="Guru (opsional)" style="width:170px;">
          </div>

          <button class="btn btn-primary" type="submit">Tambah Jadwal</button>
        </form>

        <!-- Tabel -->
        <div style="overflow:auto;">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Kelas</th>
              <th>Hari</th>
              <th>Jam</th>
              <th>Mata Pelajaran</th>
              <th>Guru</th>
              <th style="width:110px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php if($jadwal): $no=1; foreach($jadwal as $r): ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= htmlspecialchars($r['kelas']); ?></td>
              <td><?= htmlspecialchars($r['hari']); ?></td>
              <td>
                  <?= htmlspecialchars($r['jam_mulai']); ?>
                  <?= $r['jam_selesai'] ? ' - '.htmlspecialchars($r['jam_selesai']) : ''; ?>
              </td>
              <td><?= htmlspecialchars($r['mapel']); ?></td>
              <td><?= htmlspecialchars($r['guru']); ?></td>
              <td>
                <a href="jadwal_admin.php?delete_id=<?= intval($r['id']); ?>"
                   class="btn btn-xs btn-danger"
                   onclick="return confirm('Hapus jadwal ini?');">
                   Hapus
                </a>
              </td>
            </tr>
          <?php endforeach; else: ?>
            <tr>
                <td colspan="7" class="text-center">Belum ada jadwal.</td>
            </tr>
          <?php endif; ?>
          </tbody>
        </table>
        </div>

        <a href="dashboard.php" class="btn btn-default btn-sm">Kembali ke Dashboard</a>
        <a href="../siswa/jadwal.php" class="btn btn-default">Lihat di Panel Siswa</a>

      </div>

    </div>
  </div>
</div>

<script src="../bootstrap/bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
