<?php
include "../koneksi.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id_siswa = $_POST['id_siswa'];
    $nis      = $_POST['nis'];
    $nama     = $_POST['nama_siswa'];
    $kelas    = $_POST['kelas'];
    $jk       = $_POST['jk'];
    $jurusan  = $_POST['jurusan'];
    $email    = $_POST['email'];
    $no_hp    = $_POST['no_hp'];
    $password = $_POST['password'];

    try {

        // jika password diisi → ikut diupdate
        if($password != ''){
            $password_md5 = md5($password);

            $sql = "UPDATE siswa SET 
                        nis = :nis,
                        nama_siswa = :nama,
                        kelas = :kelas,
                        jk = :jk,
                        jurusan = :jurusan,
                        email = :email,
                        no_hp = :no_hp,
                        password = :password
                    WHERE id_siswa = :id";

            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nis'      => $nis,
                ':nama'     => $nama,
                ':kelas'    => $kelas,
                ':jk'       => $jk,
                ':jurusan'  => $jurusan,
                ':email'    => $email,
                ':no_hp'    => $no_hp,
                ':password' => $password_md5,
                ':id'       => $id_siswa
            ]);

        } else {
            // password tidak diubah
            $sql = "UPDATE siswa SET 
                        nis = :nis,
                        nama_siswa = :nama,
                        kelas = :kelas,
                        jk = :jk,
                        jurusan = :jurusan,
                        email = :email,
                        no_hp = :no_hp
                    WHERE id_siswa = :id";

            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nis'      => $nis,
                ':nama'     => $nama,
                ':kelas'    => $kelas,
                ':jk'       => $jk,
                ':jurusan'  => $jurusan,
                ':email'    => $email,
                ':no_hp'    => $no_hp,
                ':id'       => $id_siswa
            ]);
        }

        header("Location: siswa.php");
        exit;

    } catch (PDOException $e) {
        die("Gagal mengupdate data: " . $e->getMessage());
    }

} else {
    header("Location: siswa.php");
    exit;
}
?>
