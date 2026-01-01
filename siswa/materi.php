<?php include "header.php"; ?>
<div class="container" style="margin-top:20px">

    <div class="panel panel-info">
        <div class="panel-heading"><h4>Materi Pembelajaran</h4></div>
        <div class="panel-body">

            <table class="table table-bordered table-striped">
                <tr>
                    <th>Judul</th>
                    <th>File</th>
                    <th>Tanggal</th>
                </tr>

                <?php
                include "../koneksi.php";

                try {
                    $stmt = $conn->prepare("SELECT * FROM materi ORDER BY uploaded_at DESC");
                    $stmt->execute();
                    $materi = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    die("Gagal mengambil data materi: " . $e->getMessage());
                }

                if ($materi):
                    foreach ($materi as $d):
                ?>
                <tr>
                    <td><?= htmlspecialchars($d['judul']); ?></td>
                    <td>
                        <a href="../guru/materi/<?= htmlspecialchars($d['file']); ?>" 
                           class="btn btn-primary btn-sm" 
                           download>
                           Download
                        </a>
                    </td>
                    <td><?= htmlspecialchars($d['uploaded_at']); ?></td>
                </tr>
                <?php 
                    endforeach;
                else:
                ?>
                <tr>
                    <td colspan="3" class="text-center">Belum ada materi pembelajaran.</td>
                </tr>
                <?php endif; ?>
            </table>

        </div>
    </div>

</div>
<?php include "../footer.php"; ?>
