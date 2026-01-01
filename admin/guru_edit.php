<?php
include "../koneksi.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

try {
    $stmt = $conn->prepare("SELECT * FROM guru WHERE id_guru = :id LIMIT 1");
    $stmt->execute([':id' => $id]);
    $g = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$g) {
        echo "<script>alert('Data guru tidak ditemukan!');window.location='guru.php';</script>";
        exit;
    }

} catch (PDOException $e) {
    die("Terjadi kesalahan: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Guru - RAID SCHOOL</title>

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
                    <span class="glyphicon glyphicon-edit"></span> Edit Guru
                </h3>
                <small>Perbarui data Guru. Kosongkan kolom password jika tidak ingin mengubah.</small>
            </div>

            <div class="box-body">

                <a href="guru.php" class="btn btn-default btn-sm" style="margin-bottom:15px;">
                    <span class="glyphicon glyphicon-chevron-left"></span> Kembali
                </a>

                <form class="form-horizontal" method="post" action="guru_update.php">
                    <input type="hidden" name="id_guru" value="<?= $g['id_guru']; ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">NIP</label>
                        <div class="col-sm-8">
                            <input type="text" name="nip" class="form-control"
                                   value="<?= $g['nip']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Guru</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_guru" class="form-control"
                                   value="<?= $g['nama_guru']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mapel</label>
                        <div class="col-sm-8">
                            <input type="text" name="mapel" class="form-control"
                                   value="<?= $g['mapel']; ?>" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control"
                                   value="<?= $g['email']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">No HP</label>
                        <div class="col-sm-8">
                            <input type="text" name="no_hp" class="form-control"
                                   value="<?= $g['no_hp']; ?>" required>
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