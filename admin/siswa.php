<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Siswa - RAID SCHOOL</title>

     <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <!-- DataTables -->
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
                <h3>Data Siswa</h3>
                <small>Kelola informasi siswa, jurusan, dan akun login siswa.</small>
            </div>

            <div class="box-body">

                <div class="clearfix" style="margin-bottom:15px;">
                    <div class="pull-left">
                        <a href="siswa_form.php" class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-plus"></span> Tambah Siswa
                        </a>
                        <a href="dashboard.php" class="btn btn-default btn-sm">
                            Kembali ke Dashboard
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="tabel-siswa" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>Jurusan</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th style="width:120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        try {
                            $stmt = $conn->query("SELECT * FROM siswa ORDER BY id_siswa DESC");
                            $siswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $no = 1;

                            foreach($siswa as $row){
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($row['nis']); ?></td>
                                <td><?= htmlspecialchars($row['nama_siswa']); ?></td>
                                <td><?= htmlspecialchars($row['kelas']); ?></td>
                                <td><?= htmlspecialchars($row['jk']); ?></td>
                                <td><?= htmlspecialchars($row['jurusan']); ?></td>
                                <td><?= htmlspecialchars($row['email']); ?></td>
                                <td><?= htmlspecialchars($row['no_hp']); ?></td>
                                <td>
                                    <a href="siswa_edit.php?id=<?= $row['id_siswa']; ?>" class="btn btn-info btn-xs">
                                        Edit
                                    </a>
                                    <a href="siswa_hapus.php?id=<?= $row['id_siswa']; ?>"
                                       class="btn btn-danger btn-xs"
                                       onclick="return confirm('Yakin ingin menghapus data ini?');">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php
                            }
                        } catch (PDOException $e) {
                            echo "<tr><td colspan='9'>Gagal mengambil data: ".$e->getMessage()."</td></tr>";
                        }
                        ?>
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
        $('#tabel-siswa').DataTable({
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
