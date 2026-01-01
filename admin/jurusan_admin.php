<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Program - RAID SCHOOL</title>

    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../DataTables/datatables.min.css">

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
            padding:18px 25px;
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
            padding:20px 25px 25px;
            border-radius:0 0 6px 6px;
            box-shadow:0 4px 15px rgba(0,0,0,.08);
            border:1px solid #e3e3e3;
            border-top:none;
        }

        .btn-success{
            background:#1c9b8e;
            border-color:#1c9b8e;
        }
        .btn-success:hover{
            background:#147a6b;
            border-color:#147a6b;
        }

        table.dataTable thead tr{
            background:#f3f7f6;
        }
        table.dataTable thead th{
            border-bottom:1px solid #ddd;
        }

        img.thumb {
            width:60px;
            height:60px;
            object-fit:cover;
            border-radius:5px;
            border:1px solid #e6e6e6;
        }
    </style>
</head>
<body>

<div class="container page-wrapper">

    <div class="row">
        <div class="col-md-12">

            <div class="box-header">
                <h3>Data Program</h3>
                <small>Tambah / Edit jurusan yang tampil di halaman Program Keahlian</small>
            </div>

            <div class="box-body">

                <div class="clearfix" style="margin-bottom:15px;">
                    <div class="pull-left">
                        <a href="program_form.php" class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-plus"></span> Tambah Program
                        </a>
                        <a href="dashboard.php" class="btn btn-default btn-sm">
                            Kembali ke Dashboard
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="tabel-program" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th style="width:120px;">Aksi</th>
                            </tr>
                        </thead>
                       <tbody>
                                <?php
                                $no = 1;

                                try {
                                    $stmt = $conn->prepare("SELECT * FROM program_keahlian ORDER BY id_program DESC");
                                    $stmt->execute();
                                    $programs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                } catch (PDOException $e) {
                                    die("Gagal mengambil data program: " . $e->getMessage());
                                }

                                foreach ($programs as $p) {

                                    $short_desc = strlen($p['deskripsi']) > 80 
                                                    ? substr($p['deskripsi'], 0, 80) . '...' 
                                                    : $p['deskripsi'];
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($p['kode_program']); ?></td>
                                    <td><?= htmlspecialchars($p['nama_program']); ?></td>
                                    <td><?= htmlspecialchars($short_desc); ?></td>

                                    <td>
                                        <?php if (!empty($p['gambar'])): ?>
                                            <img src="uploads/program/<?= htmlspecialchars($p['gambar']); ?>"
                                                style="width:60px;height:60px;object-fit:cover;border-radius:5px;">
                                        <?php else: ?>
                                            <span style="color:#bbb;">Tidak ada gambar</span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <a href="program_edit.php?id=<?= $p['id_program']; ?>" 
                                        class="btn btn-info btn-xs">
                                        Edit
                                        </a>

                                        <a href="program_hapus.php?id=<?= $p['id_program']; ?>"
                                        class="btn btn-danger btn-xs"
                                        onclick="return confirm('Yakin ingin menghapus data ini?');">
                                        Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>

</div>

<script src="../bootstrap/bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script src="../DataTables/datatables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tabel-program').DataTable({
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                "infoEmpty": "Tidak ada data",
                "search": "Cari:",
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "next": "›",
                    "previous": "‹"
                }
            }
        });
    });
</script>

</body>
</html>
