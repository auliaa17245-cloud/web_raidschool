<?php
include "koneksi.php"; // pastikan sudah PDO

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama  = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $pesan = trim($_POST['pesan']);

    try {
        $stmt = $conn->prepare("
            INSERT INTO pesan_kontak (nama, email, pesan)
            VALUES (:nama, :email, :pesan)
        ");

        $sukses = $stmt->execute([
            ':nama'  => $nama,
            ':email' => $email,
            ':pesan' => $pesan
        ]);

        if ($sukses) {
            echo "<script>
                    alert('Pesan berhasil dikirim. Terima kasih!');
                    window.location='kontak.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal mengirim pesan!');
                    window.history.back();
                  </script>";
        }

    } catch (PDOException $e) {
        echo "<script>
                alert('Terjadi kesalahan: ".$e->getMessage()."');
                window.history.back();
              </script>";
    }

} else {
    header('Location: kontak.php');
    exit;
}
