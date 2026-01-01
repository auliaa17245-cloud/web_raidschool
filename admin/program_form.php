<?php
// program_form.php
// Letakkan file ini di folder admin/
// Pastikan ada file ../koneksi.php yang meng-set $conn jika kamu pakai include koneksi di sini.

include "../koneksi.php"; // hapus atau sesuaikan jika koneksi sudah di-include di parent

// Jika dipakai dari program_edit.php, variable $p kemungkinan sudah berisi data.
// Jika tidak, kita inisialisasi agar form tetap aman (tidak error).
if (!isset($p) || !is_array($p)) {
    $p = [
        'id_program'   => '',
        'kode_program' => '',
        'nama_program' => '',
        'deskripsi'    => '',
        'gambar'       => ''
    ];
}

// Tentukan aksi form: update kalau ada id, atau simpan baru kalau kosong.
$action = $p['id_program'] ? 'program_update.php' : 'program_simpan.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tambah Program - RAID SCHOOL</title>

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
                    <span class="glyphicon glyphicon-user"></span>
                    <?= $p['id_program'] ? 'Edit Program' : 'Tambah Program' ?>
                </h3>
                <small>Tambah/edit jurusan yang tampil di halaman Program Keahlian.</small>
            </div>

            <div class="box-body">
                <a href="jurusan_admin.php" class="btn btn-default btn-sm" style="margin-bottom:15px;">
                    <span class="glyphicon glyphicon-chevron-left"></span> Kembali
                </a>

                <!-- action otomatis tergantung apakah kita edit / tambah -->
                <form class="form-horizontal" method="post" action="<?= $action ?>" enctype="multipart/form-data">

                    <!-- hidden id (penting untuk update) -->
                    <input type="hidden" name="id_program" value="<?= htmlspecialchars($p['id_program']) ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kode Program</label>
                        <div class="col-sm-8">
                            <input type="text" name="kode_program" class="form-control" placeholder="kode program"
                                   required value="<?= htmlspecialchars($p['kode_program']) ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Program</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_program" class="form-control" placeholder="Nama program"
                                   required value="<?= htmlspecialchars($p['nama_program']) ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <textarea name="deskripsi" class="form-control" rows="5" required><?= htmlspecialchars($p['deskripsi']) ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gambar Jurusan (jpg/png) - opsional</label>
                        <div class="col-sm-8">
                            <?php if (!empty($p['gambar']) && file_exists("uploads/program" . $p['gambar'])): ?>
                                <div style="margin-bottom:8px;">
                                    <img src="uploads/program<?= htmlspecialchars($p['gambar']) ?>" style="width:150px; height:auto; display:block; border-radius:4px;">
                                </div>
                            <?php else: ?>
                                <div style="color:#888; margin-bottom:8px;">Belum ada gambar</div>
                            <?php endif; ?>

                            <input type="file" name="gambar" class="form-control">
                            <small class="text-muted">Max 2MB. Jika tidak upload, akan dikosongkan.</small>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top:10px;">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-floppy-disk"></span>
                                <?= $p['id_program'] ? 'Update' : 'Simpan' ?>
                            </button>
                            <a href="jurusan_admin.php" class="btn btn-default">Batal</a>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>

<!-- JS (jQuery + Bootstrap) -->
<script src="../bootstrap/bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>