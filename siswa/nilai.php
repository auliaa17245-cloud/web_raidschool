<?php include "header.php"; ?>
<div class="container" style="margin-top:20px">

    <div class="panel panel-success">
        <div class="panel-heading"><h4>Nilai Saya</h4></div>
        <div class="panel-body">

            <table class="table table-bordered table-striped">
                <tr>
                    <th>Kelas</th>
                    <th>Tugas</th>
                    <th>UH</th>
                    <th>UTS</th>
                    <th>UAS</th>
                </tr>

                <?php
                include "../koneksi.php";
                $nama = $_SESSION['user_nama'];

                try {
                    $stmt = $conn->prepare("SELECT * FROM nilai WHERE nama_siswa = :nama");
                    $stmt->execute([':nama' => $nama]);
                    $nilai = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    die("Gagal mengambil data nilai: " . $e->getMessage());
                }

                if ($nilai):
                    foreach ($nilai as $d):
                ?>
                <tr>
                    <td><?= htmlspecialchars($d['kelas']); ?></td>
                    <td><?= htmlspecialchars($d['tugas']); ?></td>
                    <td><?= htmlspecialchars($d['uh']); ?></td>
                    <td><?= htmlspecialchars($d['uts']); ?></td>
                    <td><?= htmlspecialchars($d['uas']); ?></td>
                </tr>
                <?php 
                    endforeach;
                else:
                ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data nilai.</td>
                </tr>
                <?php endif; ?>
            </table>

        </div>
    </div>

</div>
<?php include "../footer.php"; ?>
