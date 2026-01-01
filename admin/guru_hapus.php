<?php
include "../koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: guru.php");
    exit;
}

$id = intval($_GET['id']); 

try {
    $stmt = $conn->prepare("DELETE FROM guru WHERE id_guru = :id");
    $stmt->execute([':id' => $id]);

    header("Location: guru.php");
    exit;

} catch (PDOException $e) {
    die("Gagal menghapus data: " . $e->getMessage());
}
