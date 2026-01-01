<?php
include "../koneksi.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nip      = trim($_POST['nip']);
    $nama     = trim($_POST['nama_guru']);
    $mapel    = trim($_POST['mapel']);
    $email    = trim($_POST['email']);
    $no_hp    = trim($_POST['no_hp']);
    
    
    $password = md5($_POST['password']);  

    try {
        $stmt = $conn->prepare("
            INSERT INTO guru (nip, nama_guru, mapel, email, no_hp, password)
            VALUES (:nip, :nama, :mapel, :email, :no_hp, :password)
        ");

        $stmt->execute([
            ':nip'      => $nip,
            ':nama'     => $nama,
            ':mapel'    => $mapel,
            ':email'    => $email,
            ':no_hp'    => $no_hp,
            ':password' => $password
        ]);

        header("Location: guru.php");
        exit;

    } catch (PDOException $e) {
        die("Gagal menyimpan data: " . $e->getMessage());
    }

} else {
    header("Location: guru_form.php");
    exit;
}
