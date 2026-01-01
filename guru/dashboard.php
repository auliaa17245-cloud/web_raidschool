<?php include "header_guru.php"; ?>

<div class="container" style="margin-top: 30px;">

    <div class="alert alert-success">
        <h3>Halo, Guru 👋</h3>
        <p>Selamat datang di panel guru SMKS RAID SCHOOL. Kelola data mengajar dan informasi akademik dengan mudah.</p>
    </div>

    <div class="row">
        
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4><i class="glyphicon glyphicon-pencil"></i> Input Nilai</h4>
                </div>
                <div class="panel-body">
                    Masukkan nilai tugas, ulangan harian, UTS, UAS, dan nilai akhir siswa.
                </div>
                <div class="panel-footer text-center">
                    <a href="input_nilai.php" class="btn btn-primary btn-block">Input Nilai</a>
                </div>
            </div>
        </div>

          <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4><i class="glyphicon glyphicon-book"></i> Materi Ajar</h4>
                </div>
                <div class="panel-body">
                    Upload materi, modul, file PDF, atau tugas untuk siswa.
                </div>
                <div class="panel-footer text-center">
                    <a href="materi_ajar.php" class="btn btn-info btn-block">Kelola Materi</a>
                </div>
            </div>
        </div>

   
    </div>
</div>
<?php include "footer.php" ?>
