<?php include "header_guru.php"; ?>
<div class="container" style="margin-top:20px">

    <div class="panel panel-success">
        <div class="panel-heading"><h4>Input Nilai Siswa</h4></div>
        <div class="panel-body">

            <form method="post">
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas" class="form-control" required>
                        <option value="">-- pilih kelas --</option>
                        <option>X</option>
                        <option>XI</option>
                        <option>XII</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nilai Tugas</label>
                    <input type="number" name="tugas" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nilai UH</label>
                    <input type="number" name="uh" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nilai UTS</label>
                    <input type="number" name="uts" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nilai UAS</label>
                    <input type="number" name="uas" class="form-control" required>
                </div>

                <button name="simpan" class="btn btn-primary btn-block">Simpan Nilai</button>
            </form>

            <?php
            include "../koneksi.php";

            if (isset($_POST['simpan'])) {
                $id_guru = $_SESSION['user_id'];
                $kelas   = trim($_POST['kelas']);
                $nama    = trim($_POST['nama_siswa']);
                $tugas   = $_POST['tugas'];
                $uh      = $_POST['uh'];
                $uts     = $_POST['uts'];
                $uas     = $_POST['uas'];

                try {
                    $stmt = $conn->prepare("
                        INSERT INTO nilai 
                        (id_guru, kelas, nama_siswa, tugas, uh, uts, uas) 
                        VALUES (:id_guru, :kelas, :nama, :tugas, :uh, :uts, :uas)
                    ");

                    $stmt->execute([
                        ':id_guru' => $id_guru,
                        ':kelas'   => $kelas,
                        ':nama'    => $nama,
                        ':tugas'   => $tugas,
                        ':uh'      => $uh,
                        ':uts'     => $uts,
                        ':uas'     => $uas
                    ]);

                    echo "<div class='alert alert-success' style='margin-top:15px'>
                            Nilai berhasil disimpan!
                          </div>";

                } catch (PDOException $e) {
                    echo "<div class='alert alert-danger' style='margin-top:15px'>
                            Gagal menyimpan nilai: ".$e->getMessage()."
                          </div>";
                }
            }
            ?>

        </div>
    </div>

</div>
<?php include "footer.php"; ?>
