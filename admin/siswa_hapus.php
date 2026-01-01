<?php
include "../koneksi.php";

if (!isset($_GET['id']) || $_GET['id'] == '') {
    header("Location: siswa.php");
    exit;
}

$id = $_GET['id'];

try {
    $stmt = $conn->prepare("DELETE FROM siswa WHERE id_siswa = :id");
    $stmt->execute([':id' => $id]);

    header("Location: siswa.php");
    exit;

} catch (PDOException $e) {
    die("Gagal menghapus data: " . $e->getMessage());
}
?>
