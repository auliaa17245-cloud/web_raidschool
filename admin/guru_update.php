<?php
include "../koneksi.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id_guru = $_POST['id_guru'];
    $nip     = trim($_POST['nip']);
    $nama    = trim($_POST['nama_guru']);
    $mapel   = trim($_POST['mapel']);
    $email   = trim($_POST['email']);
    $no_hp   = trim($_POST['no_hp']);
    $password= trim($_POST['password']);

    try {

        // Jika password diisi → update dengan password baru
        if($password !== ''){

            $password_md5 = md5($password);

            $stmt = $conn->prepare("
                UPDATE guru SET
                    nip        = :nip,
                    nama_guru  = :nama,
                    mapel      = :mapel,
                    email      = :email,
                    no_hp      = :no_hp,
                    password   = :password
                WHERE id_guru = :id
            ");

            $stmt->execute([
                ':nip'       => $nip,
                ':nama'      => $nama,
                ':mapel'     => $mapel,
                ':email'     => $email,
                ':no_hp'     => $no_hp,
                ':password'  => $password_md5,
                ':id'        => $id_guru
            ]);

        } else {

            // Jika password dikosongkan → tidak diubah
            $stmt = $conn->prepare("
                UPDATE guru SET
                    nip        = :nip,
                    nama_guru  = :nama,
                    mapel      = :mapel,
                    email      = :email,
                    no_hp      = :no_hp
                WHERE id_guru = :id
            ");

            $stmt->execute([
                ':nip'   => $nip,
                ':nama'  => $nama,
                ':mapel' => $mapel,
                ':email' => $email,
                ':no_hp' => $no_hp,
                ':id'    => $id_guru
            ]);
        }

        header("Location: guru.php");
        exit;

    } catch (PDOException $e) {
        die("Gagal mengupdate data: " . $e->getMessage());
    }

} else {
    header("Location: guru.php");
    exit;
}
