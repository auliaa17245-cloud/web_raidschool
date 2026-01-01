<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tambah Siswa - RAID SCHOOL</title>

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
                    <span class="glyphicon glyphicon-user"></span> Tambah Siswa
                </h3>
                <small>Masukkan data siswa dengan lengkap untuk keperluan akademik dan akun login.</small>
            </div>

            <div class="box-body">
                <a href="siswa.php" class="btn btn-default btn-sm" style="margin-bottom:15px;">
                    <span class="glyphicon glyphicon-chevron-left"></span> Kembali
                </a>

                <form class="form-horizontal" method="post" action="siswa_simpan.php">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">NIS</label>
                        <div class="col-sm-8">
                            <input type="text" name="nis" class="form-control" placeholder="Nomor induk siswa" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Siswa</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_siswa" class="form-control" placeholder="Nama lengkap siswa" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kelas</label>
                        <div class="col-sm-8">
                            <input type="text" name="kelas" class="form-control" placeholder="X / XI / XII" required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <input type="text" name="jk" class="form-control" placeholder="laki-laki/perempuan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jurusan</label>
                        <div class="col-sm-8">
                            <input type="text" name="jurusan" class="form-control" placeholder="Contoh: TKJ" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control" placeholder="Email aktif siswa" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">No HP</label>
                        <div class="col-sm-8">
                            <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP siswa / orang tua" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password Login</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" placeholder="Password untuk akun siswa" required>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top:10px;">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Simpan
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