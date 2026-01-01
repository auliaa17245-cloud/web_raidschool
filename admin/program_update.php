<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: jurusan_admin.php");
    exit;
}

try {

    $id_program   = $_POST['id_program'] ?? '';
    $kode_program = $_POST['kode_program'] ?? '';
    $nama_program = $_POST['nama_program'] ?? '';
    $deskripsi    = $_POST['deskripsi'] ?? '';

    if ($id_program == '') {
        die("ID program tidak ditemukan.");
    }

    // =========================
    // AMBIL DATA LAMA
    // =========================
    $stmt = $conn->prepare("SELECT gambar FROM program_keahlian WHERE id_program = :id LIMIT 1");
    $stmt->execute([':id' => $id_program]);
    $old  = $stmt->fetch(PDO::FETCH_ASSOC);

    $old_gambar = $old ? $old['gambar'] : '';

    $folder = "uploads/program/";
    $nama_file_baru = $old_gambar;


    // =========================
    // JIKA ADA GAMBAR BARU
    // =========================
    if (!empty($_FILES['gambar']['name'])) {

        $file_name = $_FILES['gambar']['name'];
        $file_tmp  = $_FILES['gambar']['tmp_name'];
        $file_size = $_FILES['gambar']['size'];
        $file_err  = $_FILES['gambar']['error'];

        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];

        if ($file_err === 0) {

            if (!in_array($ext, $allowed)) {
                die("Format file tidak diizinkan. Hanya jpg/jpeg/png/gif.");
            }

            if ($file_size > 2 * 1024 * 1024) {
                die("Gambar terlalu besar. Maks 2MB.");
            }

            if (!is_dir($folder)) {
                if (!mkdir($folder, 0777, true)) {
                    die("Gagal membuat folder upload.");
                }
            }

            $safe_name = preg_replace('/[^a-zA-Z0-9\-_\.]/', '', $file_name);
            $nama_file_baru = time() . '_' . $safe_name;

            if (!move_uploaded_file($file_tmp, $folder . $nama_file_baru)) {
                die("Gagal mengupload file gambar.");
            }

            // hapus gambar lama jika berbeda dan ada
            if ($old_gambar != "" && $old_gambar !== $nama_file_baru && file_exists($folder . $old_gambar)) {
                @unlink($folder . $old_gambar);
            }

        } else {
            die("Upload error code: " . intval($file_err));
        }
    }


    // =========================
    // UPDATE DATABASE (PDO)
    // =========================
    $update = $conn->prepare("
        UPDATE program_keahlian SET
            kode_program = :kode,
            nama_program = :nama,
            deskripsi    = :desk,
            gambar       = :gambar
        WHERE id_program = :id
    ");

    $update->execute([
        ':kode'   => $kode_program,
        ':nama'   => $nama_program,
        ':desk'   => $deskripsi,
        ':gambar' => $nama_file_baru,
        ':id'     => $id_program
    ]);

    header("Location: jurusan_admin.php?msg=update_ok");
    exit;

} catch (PDOException $e) {

    // jika gagal & sudah upload gambar baru → hapus agar tidak nyampah
    if ($nama_file_baru != "" && $nama_file_baru !== $old_gambar && file_exists($folder . $nama_file_baru)) {
        @unlink($folder . $nama_file_baru);
    }

    die("Gagal mengupdate data: " . $e->getMessage());
}
?>
