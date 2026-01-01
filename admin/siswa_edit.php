<?php
include "../koneksi.php";

if (!isset($_GET['id']) || $_GET['id'] == '') {
    header("Location: siswa.php");
    exit;
}

$id = $_GET['id'];

try {
    $stmt = $conn->prepare("SELECT * FROM siswa WHERE id_siswa = :id LIMIT 1");
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        echo "<script>
                alert('Data siswa tidak ditemukan!');
                window.location='siswa.php';
              </script>";
        exit;
    }

} catch (PDOException $e) {
    die("Gagal mengambil data siswa: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Siswa - RAID SCHOOL</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">

    <style>
        body{
            background:#f5f5f5;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }

        .page-wrapper{
            margin-top:40px;
            margin-bottom:40px;
        }

        .box-header{
            background:#1c9b8e;
            color:#fff;
            padding:20px 25px;
            border-radius:6px 6px 0 0;
        }

        .box-header h3{
            margin:0;
            font-weight:600;
        }
        .box-header small{
            color:#e0f8f3;
        }

        .box-body{
            background:#fff;
            padding:25px 30px 30px;
            border-radius:0 0 6px 6px;
            box-shadow:0 4px 15px rgba(0,0,0,.08);
            border:1px solid #e3e3e3;
            border-top:none;
        }

        .control-label{
            font-weight:500;
        }

        .form-control{
            border-radius:4px;
            box-shadow:none;
            border-color:#ddd;
        }
        .form-control:focus{
            border-color:#1c9b8e;
            box-shadow:0 0 0 1px rgba(28,155,142,.15);
        }

        .btn-primary{
            background:#1c9b8e;
            border-color:#1c9b8e;
        }
        .btn-primary:hover{
            background:#147a6b;
            border-color:#147a6b;
        }

        .btn-default{
            border-radius:4px;
        }
    </style>
</head>
<body>

<div class="container page-wrapper">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="box-header">
                <h3>
                    <span class="glyphicon glyphicon-edit"></span> Edit Siswa
                </h3>
                <small>Perbarui data siswa. Kosongkan kolom password jika tidak ingin mengubah.</small>
            </div>

            <div class="box-body">

                <a href="siswa.php" class="btn btn-default btn-sm" style="margin-bottom:15px;">
                    <span class="glyphicon glyphicon-chevron-left"></span> Kembali
                </a>

                <form class="form-horizontal" method="post" action="siswa_update.php">
                    <input type="hidden" name="id_siswa" value="<?= $row['id_siswa']; ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">NIS</label>
                        <div class="col-sm-8">
                            <input type="text" name="nis" class="form-control"
                                   value="<?= $row['nis']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Siswa</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_siswa" class="form-control"
                                   value="<?= $row['nama_siswa']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kelas</label>
                        <div class="col-sm-8">
                            <input type="text" name="kelas" class="form-control"
                                   value="<?= $row['kelas']; ?>" required>
                        </div>
                    </div>

                       <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <input type="text" name="jk" class="form-control"
                                   value="<?= $row['jk']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jurusan</label>
                        <div class="col-sm-8">
                            <input type="text" name="jurusan" class="form-control"
                                   value="<?= $row['jurusan']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control"
                                   value="<?= $row['email']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">No HP</label>
                        <div class="col-sm-8">
                            <input type="text" name="no_hp" class="form-control"
                                   value="<?= $row['no_hp']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password Login</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control"
                                   placeholder="Kosongkan jika tidak diubah">
                        </div>
                    </div>

                    <div class="form-group" style="margin-top:10px;">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Update
                            </button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>

</div>

</body>
</html>