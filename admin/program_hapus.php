<?php
include "../koneksi.php";

if (!isset($_GET['id']) || $_GET['id'] == '') {
    header("Location: jurusan_admin.php");
    exit;
}

$id = (int) $_GET['id'];

try {
    $stmt = $conn->prepare("DELETE FROM program_keahlian WHERE id_program = :id");
    $stmt->execute([':id' => $id]);

    header("Location: jurusan_admin.php");
    exit;

} catch (PDOException $e) {
    die("Gagal menghapus data: " . $e->getMessage());
}
?>
