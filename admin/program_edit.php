<?php
// program_edit.php (PDO Version)
include "../koneksi.php";

if (!isset($_GET['id']) || $_GET['id'] == '') {
    header("Location: jurusan_admin.php");
    exit;
}

$id = (int) $_GET['id'];

try {
    $stmt = $conn->prepare("SELECT * FROM program_keahlian WHERE id_program = :id LIMIT 1");
    $stmt->execute([':id' => $id]);
    $p = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$p) {
        header("Location: jurusan_admin.php");
        exit;
    }

} catch (PDOException $e) {
    die("Query gagal: " . $e->getMessage());
}

// sekarang variabel $p akan dipakai di program_form.php
include "program_form.php";
?>
