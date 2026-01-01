<?php
// raid/program.php
include "koneksi.php";
include "header.php";

try {
    $stmt = $conn->prepare("
        SELECT id_program, kode_program, nama_program, deskripsi, gambar 
        FROM program_keahlian 
        ORDER BY nama_program ASC
    ");
    $stmt->execute();
    $program = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Terjadi kesalahan: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Program Keahlian - SMKS RAID SCHOOL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">

    <style>
        .section-title { text-align:center; margin:40px 0 20px; }
        .program-box { margin-bottom:30px; }
        .program-img { width:100%; max-height:200px; object-fit:cover; border-radius:6px; }
        .panel-body p { text-align:justify; }
        .kode-pill{
            display:inline-block;
            background:#009688;
            color:#fff;
            padding:3px 10px;
            border-radius:10px;
            font-size:12px;
            margin-bottom:8px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="section-title">
        <h2>Program Keahlian</h2>
        <p>Pilihan jurusan terbaik bagi masa depanmu</p>
    </div>

    <div class="row">
    <?php if (!empty($program)): ?>
        <?php foreach ($program as $row): ?>
            <div class="col-md-4">
                <div class="panel panel-default program-box">

                    <div class="panel-heading text-center">
                        <strong><?php echo htmlspecialchars($row['nama_program']); ?></strong>
                    </div>

                    <div class="panel-body">

                        <!-- FOTO -->
                        <?php if (!empty($row['gambar'])): ?>
                            <img src="admin/uploads/program/<?php echo htmlspecialchars($row['gambar']); ?>" 
                                 class="program-img">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/400x200?text=No+Image" 
                                 class="program-img">
                        <?php endif; ?>

                        <br><br>

                        <!-- KODE PROGRAM -->
                        <div class="kode-pill">
                            Kode: <?php echo htmlspecialchars($row['kode_program']); ?>
                        </div>

                        <!-- DESKRIPSI -->
                        <p><?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?></p>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    <?php else: ?>
        <div class="col-md-12">
            <div class="alert alert-info text-center">
                Belum ada program keahlian yang tersedia.
            </div>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php include "footer.php"; ?>
</body>
</html>
