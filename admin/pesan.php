<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesan Kontak - RAID SCHOOL</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../DataTables/datatables.min.css">

    <style>
        body{
            background: #eef2f7;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }
        .page-wrapper{
            margin-top: 25px;
        }
        .page-title{
            margin-top: 0;
            margin-bottom: 5px;
            font-weight: 600;
        }
        .page-subtitle{
            color: #777;
            margin-bottom: 20px;
        }
        .card{
            background: #ffffff;
            border-radius: 6px;
            border: 1px solid #dde3ec;
            box-shadow: 0 1px 3px rgba(0,0,0,.06);
            padding: 20px 20px 10px 20px;
        }
        table.dataTable thead th{
            background: #f4f7fb;
            border-bottom: 1px solid #dde3ec !important;
        }
        table.dataTable tbody tr:hover{
            background: #f9fcff;
        }
        .label-email{
            font-size: 11px;
            padding: 3px 7px;
            border-radius: 50px;
        }
        .btn-xs{
            padding: 3px 8px;
            font-size: 11px;
            border-radius: 50px;
        }
        .table-footer{
            font-size: 11px;
            color: #999;
            padding-top: 5px;
        }
    </style>
</head>
<body>

<div class="container page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">Pesan Kontak</h3>
            <p class="page-subtitle">
                Lihat dan kelola pesan yang dikirim dari form kontak website SMKS RAID SCHOOL.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="table-responsive">
                    <table id="tblPesan" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th style="width:5%; text-align:center;">No</th>
                            <th style="width:18%;">Nama</th>
                            <th style="width:20%;">Email</th>
                            <th>Cuplikan Pesan</th>
                            <th style="width:18%;">Tanggal</th>
                            <th style="width:13%; text-align:center;">Aksi</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        try {
                            $stmt = $conn->prepare("SELECT * FROM pesan_kontak ORDER BY tanggal DESC");
                            $stmt->execute();
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            $no = 1;
                            if ($rows) {
                                foreach ($rows as $row) {
                                    $cuplikan = substr($row['pesan'], 0, 50);
                                    if (strlen($row['pesan']) > 50) {
                                        $cuplikan .= "...";
                                    }
                        ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td>
                                <span class="label label-default label-email">
                                    <?php echo htmlspecialchars($row['email']); ?>
                                </span>
                            </td>
                            <td><?php echo htmlspecialchars($cuplikan); ?></td>
                            <td><?php echo date('d-m-Y H:i', strtotime($row['tanggal'])); ?></td>
                            <td style="text-align:center;">
                                <a href="pesan_kontak_detail.php?id=<?php echo $row['id']; ?>"
                                   class="btn btn-info btn-xs">
                                    <span class="glyphicon glyphicon-eye-open"></span> Lihat
                                </a>
                                <a href="pesan_kontak_hapus.php?id=<?php echo $row['id']; ?>"
                                   class="btn btn-danger btn-xs"
                                   onclick="return confirm('Yakin ingin menghapus pesan ini?');">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        } catch (PDOException $e) {
                            echo "<tr><td colspan='6' class='text-center'>Gagal memuat data</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12" style="margin-bottom:15px;">
                    <a href="dashboard.php" class="btn btn-default" style="border-radius:50px;">
                        <span class="glyphicon glyphicon-chevron-left"></span> Kembali ke Dashboard
                    </a>
                </div>

                <div class="table-footer">
                    * Simpan pesan penting sebelum menghapus, karena data yang dihapus tidak bisa dikembalikan.
                </div>

            </div>
        </div>
    </div>
</div>

<script src="../bootstrap/bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script src="../DataTables/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#tblPesan').DataTable({
            "pageLength": 10,
            "lengthChange": false,
            "ordering": false,
            "language": {
                "search": "Cari:",
                "zeroRecords": "Tidak ada data yang cocok",
                "info": "Menampilkan _START_ - _END_ dari _TOTAL_ pesan",
                "infoEmpty": "Menampilkan 0 pesan",
                "paginate": {
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>

</body>
</html>
