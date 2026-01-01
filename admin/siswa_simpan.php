<?php
include "../koneksi.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nis      = $_POST['nis'];
    $nama     = $_POST['nama_siswa'];
    $kelas    = $_POST['kelas'];
    $jk       = $_POST['jk'];
    $jurusan  = $_POST['jurusan'];
    $email    = $_POST['email'];
    $no_hp    = $_POST['no_hp'];

    // tetap pakai md5 agar sama dengan sistem lama
    $password = md5($_POST['password']);

    try {
        $sql = "INSERT INTO siswa 
                (nis, nama_siswa, kelas, jk, jurusan, email, no_hp, password)
                VALUES (:nis, :nama, :kelas, :jk, :jurusan, :email, :no_hp, :password)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':nis'      => $nis,
            ':nama'     => $nama,
            ':kelas'    => $kelas,
            ':jk'       => $jk,
            ':jurusan'  => $jurusan,
            ':email'    => $email,
            ':no_hp'    => $no_hp,
            ':password' => $password
        ]);

        header("Location: siswa.php");
        exit;

    } catch (PDOException $e) {
        die("Gagal menyimpan data: " . $e->getMessage());
    }

} else {
    header("Location: siswa_form.php");
    exit;
}
?>
