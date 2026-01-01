<?php
include "koneksi.php";

// Ambil data identitas dari database (PDO)
$stmt = $conn->prepare("SELECT * FROM identitas LIMIT 1");
$stmt->execute();
$iden = $stmt->fetch(PDO::FETCH_ASSOC);

// Jika belum ada data → tampilkan default
if (!$iden) {
    $iden = [
        'nama'      => 'RAIDSCHOOL',
        'alamat'    => 'Alamat belum diisi',
        'telp'      => '-',
        'email'     => '-',
        'website'   => '-',
        'deskripsi' => 'Deskripsi sekolah belum diisi. Silakan isi dari panel admin.',
        'logo'      => ''
    ];
}
?>