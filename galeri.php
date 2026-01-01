<?php include "header.php"; ?>

<style>
    .gallery-title {
        font-size: 32px;
        font-weight: bold;
        color: #1c9b8e;
        margin-bottom: 5px;
    }

    .gallery-subtitle {
        font-size: 15px;
        color: #666;
        margin-bottom: 30px;
    }

    .gallery-box {
        border-radius: 6px;
        overflow: hidden;
        margin-bottom: 25px;
        background: white;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        transition: 0.3s;
    }

    .gallery-box:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 12px rgba(0,0,0,0.25);
    }

    .gallery-box img {
        width: 100%;
        height: 230px;
        object-fit: cover;
    }

    .gallery-caption {
        padding: 12px;
        text-align: center;
        font-size: 14px;
        color: #444;
        font-weight: 600;
    }
</style>

<div class="container">

    <div class="text-center">
        <div class="gallery-title">GALERI SMKS RAID SCHOOL</div>
        <div class="gallery-subtitle">Dokumentasi kegiatan sekolah & lingkungan belajar</div>
        <hr>
    </div>

    <div class="row">

        <!-- FOTO 1 -->
        <div class="col-sm-4">
            <div class="gallery-box">
                <img src="assets/img/belajar.jpeg">
                <div class="gallery-caption">Kegiatan Belajar Mengajar</div>
            </div>
        </div>

        <!-- FOTO 2 -->
        <div class="col-sm-4">
            <div class="gallery-box">
                <img src="assets/img/seminar.jpeg">
                <div class="gallery-caption">Seminar edukatif penuh antusias</div>
            </div>
        </div>

        <!-- FOTO 3 -->
        <div class="col-sm-4">
            <div class="gallery-box">
                <img src="assets/img/praktek.jpeg">
                <div class="gallery-caption">Kegiatan Ekstrakurikuler</div>
            </div>
        </div>

        <!-- FOTO 4 -->
        <div class="col-sm-4">
            <div class="gallery-box">
                <img src="assets/img/prestasi.jpeg">
                <div class="gallery-caption">Prestasi gemilang oleh siswa</div>
            </div>
        </div>

        <!-- FOTO 5 -->
        <div class="col-sm-4">
            <div class="gallery-box">
                <img src="assets/img/kepsek.jpeg">
                <div class="gallery-caption">Kepsek ramah berkarakter kuat</div>
            </div>
        </div>

        <!-- FOTO 6 -->
        <div class="col-sm-4">
            <div class="gallery-box">
                <img src="assets/img/guru.jpeg">
                <div class="gallery-caption">suasana ruang guru beserta guru dengan aktfitasnya</div>
            </div>
        </div>

        <!-- FOTO 6 -->
        <div class="col-sm-4">
            <div class="gallery-box">
                <img src="assets/img/ekskul.jpeg">
                <div class="gallery-caption">Klub robotik penuh inspiras</div>
            </div>
        </div>

         <div class="col-sm-4">
            <div class="gallery-box">
                <img src="assets/img/jualan.jpeg">
                <div class="gallery-caption">Praktik marketing nyata sekolah</div>
            </div>
        </div>

         <div class="col-sm-4">
            <div class="gallery-box">
                <img src="assets/img/upacara.jpeg">
                <div class="gallery-caption">Upacara pagi penuh hikmat</div>
            </div>
        </div>

    </div>
</div>

<?php include "footer.php"; ?>