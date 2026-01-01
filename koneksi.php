<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "raid_school";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    // Supaya error langsung ketangkap exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Koneksi berhasil";  // optional kalau mau tes
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>