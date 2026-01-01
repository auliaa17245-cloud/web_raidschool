<?php
session_start();
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = md5($_POST['password']); // tetap sama seperti yang tersimpan

    try {
        $stmt = $conn->prepare("
            SELECT id_admin, nama_admin 
            FROM admin 
            WHERE username = :username 
              AND password = :password
            LIMIT 1
        ");

        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // simpan session
            $_SESSION['login_status'] = true;
            $_SESSION['login_role']   = 'admin';
            $_SESSION['admin_id']     = $row['id_admin'];
            $_SESSION['admin_nama']   = $row['nama_admin'];

            header("Location: admin/dashboard.php");
            exit;

        } else {
            echo "<script>
                    alert('Username atau password admin salah!');
                    window.location = 'login.php';
                  </script>";
            exit;
        }

    } catch (PDOException $e) {
        die("Login gagal: " . $e->getMessage());
    }

} else {
    header("Location: login.php");
    exit;
}
