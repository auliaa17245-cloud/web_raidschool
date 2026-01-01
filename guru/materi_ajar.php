<?php include "header_guru.php"; ?>
<div class="container" style="margin-top:20px">

    <div class="panel panel-info">
        <div class="panel-heading"><h4>Upload Materi Ajar</h4></div>
        <div class="panel-body">

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Judul Materi</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Pilih File</label>
                    <input type="file" name="file" class="form-control" required>
                </div>

                <button name="upload" class="btn btn-info btn-block">Upload Materi</button>
            </form>

            <?php
            include "../koneksi.php";

            if (isset($_POST['upload'])) {
                $id_guru = $_SESSION['user_id'];
                $judul   = trim($_POST['judul']);

                // folder tujuan
                $folder = "materi/";

                // file
                $namaFile = $_FILES['file']['name'];
                $tmp      = $_FILES['file']['tmp_name'];

                // amankan nama file
                $ext = pathinfo($namaFile, PATHINFO_EXTENSION);
                $namaBaru = "materi_" . time() . "_" . rand(1000,9999) . "." . $ext;

                // upload
                if (move_uploaded_file($tmp, $folder . $namaBaru)) {

                    try {
                        $stmt = $conn->prepare("
                            INSERT INTO materi (id_guru, judul, file) 
                            VALUES (:id_guru, :judul, :file)
                        ");

                        $stmt->execute([
                            ':id_guru' => $id_guru,
                            ':judul'   => $judul,
                            ':file'    => $namaBaru
                        ]);

                        echo "<div class='alert alert-success' style='margin-top:15px'>
                                Materi berhasil diupload!
                              </div>";

                    } catch (PDOException $e) {
                        echo "<div class='alert alert-danger' style='margin-top:15px'>
                                Gagal menyimpan ke database: ".$e->getMessage()."
                              </div>";
                    }

                } else {
                    echo "<div class='alert alert-danger' style='margin-top:15px'>
                            Gagal mengupload file!
                          </div>";
                }
            }
            ?>

        </div>
    </div>

</div>
<?php include "footer.php"; ?>
