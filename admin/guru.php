<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Guru - RAID SCHOOL</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <!-- DataTables (kalau sudah punya, samakan path-nya) -->
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
    </style>
</head>
<body>

<div class="container page-wrapper">

    <div class="row">
        <div class="col-md-12">

            <div class="box-header">
                <h3>Data Guru</h3>
                <small>Kelola informasi Guru, mapel, dan akun login guru.</small>
            </div>

            <div class="box-body">

                <div class="clearfix" style="margin-bottom:15px;">
                    <div class="pull-left">
                        <a href="guru_form.php" class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-plus"></span> Tambah Guru
                        </a>
                        <a href="dashboard.php" class="btn btn-default btn-sm">
                            Kembali ke Dashboard
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="tabel-guru" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Guru</th>
                                <th>Mapel</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th style="width:120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;

                            try {
                                $stmt = $conn->prepare("SELECT * FROM guru ORDER BY id_guru DESC");
                                $stmt->execute();
                                $guru = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            } catch (PDOException $e) {
                                die("Gagal mengambil data guru: " . $e->getMessage());
                            }

                            if ($guru):
                                foreach ($guru as $g):
                            ?>

                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $g['nip']; ?></td>
                                <td><?= $g['nama_guru']; ?></td>
                                <td><?= $g['mapel']; ?></td>
                                <td><?= $g['email']; ?></td>
                                <td><?= $g['no_hp']; ?></td>
                                <td>
                                    <a href="guru_edit.php?id=<?= $g['id_guru']; ?>" class="btn btn-info btn-xs">
                                        Edit
                                    </a>
                                    <a href="guru_hapus.php?id=<?= $g['id_guru']; ?>"
                                       class="btn btn-danger btn-xs"
                                       onclick="return confirm('Yakin ingin menghapus data ini?');">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                       <?php 
                            endforeach;
                        else:
                        ?>
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data guru.</td>
                        </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

</div>

<!-- JS -->
<script src="../bootstrap/bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script src="../DataTables/datatables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tabel-guru').DataTable({
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