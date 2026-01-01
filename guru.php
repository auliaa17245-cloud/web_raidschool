<?php
// raid/guru.php
include "koneksi.php";

// Query PDO
try {
    $stmt = $conn->prepare("SELECT nip, nama_guru, mapel, email, no_hp FROM guru ORDER BY nama_guru ASC");
    $stmt->execute();
    $guru = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Terjadi kesalahan: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Data Guru - SMKS RAID SCHOOL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php include 'header.php'; ?>

  <style>
    .section-title { text-align:center; margin:40px 0 20px; }
    .table th, .table td { vertical-align: middle; }
  </style>
</head>
<body>

<div class="container">
  <div class="section-title">
    <h2>Data Guru</h2>
    <p>Tenaga pendidik profesional kami</p>
  </div>

  <div class="panel panel-default">
    <div class="panel-body">

      <?php if (!empty($guru)): ?>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width:50px">No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Mapel</th>
              <th>Email</th>
              <th>No HP</th>
            </tr>
          </thead>

          <tbody>
            <?php 
            $no = 1;
            foreach ($guru as $row):
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo htmlspecialchars($row['nip']); ?></td>
              <td><?php echo htmlspecialchars($row['nama_guru']); ?></td>
              <td><?php echo htmlspecialchars($row['mapel']); ?></td>
              <td><?php echo htmlspecialchars($row['email']); ?></td>
              <td><?php echo htmlspecialchars($row['no_hp']); ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <?php else: ?>
        <div class="alert alert-info">Belum ada data guru yang ditampilkan.</div>
      <?php endif; ?>

    </div>
  </div>
</div>

<?php include "footer.php"; ?>
</body>
</html>
