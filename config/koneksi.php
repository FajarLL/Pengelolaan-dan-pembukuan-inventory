<?php
$host     = 'localhost';
$dbname   = 'inventory_db';
$username = 'root';
$password = ''; // Di XAMPP bawaan, password MySQL biasanya kosong

try {
    // Membuat koneksi ke database MySQL menggunakan PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Mengatur error mode agar menampilkan Exception jika query bermasalah
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Jika koneksi gagal, tampilkan pesan error
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>