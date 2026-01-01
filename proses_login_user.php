<?php
session_start();
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$kode     = $_POST['kode']; 
$password = md5($_POST['password']); // tetap sama dengan DB

try {

    // =========================
    // 1. CEK LOGIN GURU
    // =========================
    $stmtGuru = $conn->prepare("
        SELECT id_guru, nama_guru
        FROM guru
        WHERE nip = :kode AND password = :password
        LIMIT 1
    ");

    $stmtGuru->execute([
        ':kode' => $kode,
        ':password' => $password
    ]);

    $guru = $stmtGuru->fetch(PDO::FETCH_ASSOC);

    if ($guru) {
        $_SESSION['login_status'] = true;
        $_SESSION['login_role']   = 'guru';
        $_SESSION['user_id']      = $guru['id_guru'];
        $_SESSION['user_nama']    = $guru['nama_guru'];

        header("Location: guru/dashboard.php");
        exit;
    }


    // =========================
    // 2. CEK LOGIN SISWA
    // =========================
    $stmtSiswa = $conn->prepare("
        SELECT id_siswa, nama_siswa, kelas, jurusan
        FROM siswa
        WHERE nis = :kode AND password = :password
        LIMIT 1
    ");

    $stmtSiswa->execute([
        ':kode' => $kode,
        ':password' => $password
    ]);

    $siswa = $stmtSiswa->fetch(PDO::FETCH_ASSOC);

    if ($siswa) {
        $_SESSION['login_status'] = true;
        $_SESSION['login_role']   = 'siswa';
        $_SESSION['user_id']      = $siswa['id_siswa'];
        $_SESSION['user_nama']    = $siswa['nama_siswa'];
        $_SESSION['kelas']        = $siswa['kelas'] ?? '';
        $_SESSION['jurusan']      = $siswa['jurusan'] ?? '';

        header("Location: siswa/dashboard.php");
        exit;
    }

    // =========================
    // Jika dua-duanya gagal
    // =========================
    echo "<script>
        alert('Kode / Password tidak cocok!');
        window.location='login.php';
    </script>";
    exit;

} catch (PDOException $e) {
    die("Login gagal: " . $e->getMessage());
}
