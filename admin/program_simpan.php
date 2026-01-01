<?php
include "../koneksi.php";

try {

    $kode_program = $_POST['kode_program'] ?? '';
    $nama_program = $_POST['nama_program'] ?? '';
    $deskripsi    = $_POST['deskripsi'] ?? '';

    // =========================
    // UPLOAD GAMBAR
    // =========================
    $nama_file = "";

    if (!empty($_FILES['gambar']['name'])) {

        $folder = "uploads/program/";

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $gambar_name = $_FILES['gambar']['name'];
        $gambar_tmp  = $_FILES['gambar']['tmp_name'];

        // amankan nama file
        $safe_name = preg_replace('/[^a-zA-Z0-9\-_\.]/', '', $gambar_name);
        $nama_file = time() . '_' . $safe_name;

        move_uploaded_file($gambar_tmp, $folder . $nama_file);
    }

    // =========================
    // SIMPAN PDO
    // =========================
    $stmt = $conn->prepare("
        INSERT INTO program_keahlian (kode_program, nama_program, deskripsi, gambar)
        VALUES (:kode, :nama, :deskripsi, :gambar)
    ");

    $stmt->execute([
        ':kode'      => $kode_program,
        ':nama'      => $nama_program,
        ':deskripsi' => $deskripsi,
        ':gambar'    => $nama_file
    ]);

    header("Location: jurusan_admin.php");
    exit;

} catch (PDOException $e) {
    die("Gagal menyimpan data: " . $e->getMessage());
}
?>
