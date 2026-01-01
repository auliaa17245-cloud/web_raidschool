<?php
include "../koneksi.php";
// include "cek_session.php";

// kalau tidak ada parameter id, balik ke list
if (!isset($_GET['id'])) {
    header("Location: pesan.php");
    exit;
}

$id = (int) $_GET['id'];

try {
    // cek dulu datanya ada atau tidak
    $stmt = $conn->prepare("SELECT id FROM pesan_kontak WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $id]);
    $cek = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cek) {
        echo "<script>
                alert('Pesan tidak ditemukan.');
                window.location='pesan.php';
              </script>";
        exit;
    }

    // hapus data
    $delete = $conn->prepare("DELETE FROM pesan_kontak WHERE id = :id");
    $delete->execute([':id' => $id]);

    echo "<script>
            alert('Pesan berhasil dihapus.');
            window.location='pesan.php';
          </script>";
    exit;

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
