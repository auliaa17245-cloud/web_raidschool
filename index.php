<?php include "get_identitas.php"; 
include "header.php";
?>


</nav>

<!-- HERO -->
<!-- HERO FULL BACKGROUND -->
<section class="hero-full">
  <div class="hero-overlay"></div>

  <div class="hero-content container">
    <h1 class="hero-title">
      <?php echo $iden['nama']; ?>
    </h1>

    <p class="hero-subtitle">
      <span style="color:#00a88e;">Best Platform</span> to Empower Student Skills
    </p>

    <p class="hero-desc">
      <?php
        if (!empty($iden['deskripsi'])) {
            echo nl2br($iden['deskripsi']);
        } else {
            echo "Tempat belajar berbasis teknologi untuk menyiapkan lulusan siap kerja, kreatif, dan berakhlak mulia.";
        }
      ?>
    </p>

    <a href="program.php" class="btn btn-success btn-cta">
      Lihat Program Keahlian
    </a>
  </div>
</section>
<div style="background:#93e9be; padding:10px; margin-top:30px; border-radius:5px;">
    <marquee behavior="scroll" direction="left" style="font-size:16px; font-weight:bold; color:#0d8a43;">
         📢 ASSALAMUALAIKUM SELAMAT DATANG DI <?php echo $iden['nama']; ?> 
            |Be Bold. Be Bright. Be RAID
    </marquee>
</div>

<!-- TOP CATEGORIES -->
<div class="container" style="background:#e0f4e5; padding:40px; border-radius:10px; margin-top:20px;">
    <div class="section-title">
        <h3>Bidang Unggulan</h3>
        <p>Pilihan program keahlian terbaik di <?php echo $iden['nama']; ?></p>
    </div>
    <div class="text-center">
        <span class="category-pill">Teknik Komputer & Jaringan</span>
        <span class="category-pill">Rekayasa Perangkat Lunak</span>
        <span class="category-pill">Multimedia</span>
        <span class="category-pill">Robotik</span>
        <span class="category-pill">Digital Marketing</span>
        <span class="category-pill">Kegiatan OSIS & Ekstrakurikuler</span>
    </div>
</div>

<!-- POPULAR PROGRAM -->
<div class="container" style="margin-top:40px;">
    <div class="section-title">
        <h3>Program Keahlian Populer</h3>
    </div>
    <div class="row">
        <!-- Card 1 -->
        <div class="col-sm-6 col-md-3">
            <div class="program-card">
                <img src="assets/img/jaringan.jpeg" alt="TKJ">
                <div class="program-body">
                    <div class="program-title">Teknik Komputer & Jaringan</div>
                    <p>Belajar jaringan komputer, server, dan infrastruktur IT modern.</p>
                </div>
                <div class="program-footer">
                    3 Tahun · Sertifikasi Kompetensi
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="col-sm-6 col-md-3">
            <div class="program-card">
                <img src="assets/img/rpl.jpeg" alt="RPL">
                <div class="program-body">
                    <div class="program-title">Rekayasa Perangkat Lunak</div>
                    <p>Fokus pada pembuatan aplikasi web, mobile, dan basis data.</p>
                </div>
                <div class="program-footer">
                    3 Tahun · Project Berbasis Industri
                </div>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="col-sm-6 col-md-3">
            <div class="program-card">
                <img src="assets/img/multimedia.jpeg" alt="Multimedia">
                <div class="program-body">
                    <div class="program-title">Multimedia</div>
                    <p>Desain grafis, editing video, animasi, dan kreatif digital.</p>
                </div>
                <div class="program-footer">
                    3 Tahun · Portofolio Kreatif
                </div>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="col-sm-6 col-md-3">
            <div class="program-card">
                <img src="assets/img/marketing.jpeg" alt="Digital Marketing">
                <div class="program-body">
                    <div class="program-title">Digital Marketing</div>
                    <p>Digital Marketing mempelajari strategi promosi berbasis teknologi.</p>
                </div>
                <div class="program-footer">
                    3 Tahun · Siap Kerja di Perkantoran
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>