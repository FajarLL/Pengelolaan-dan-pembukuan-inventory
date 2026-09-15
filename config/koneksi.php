<?php
try {
    // Dipaksa pakai TCP IP ke port 3307 & database inventory_db
    $pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=inventory_db;charset=utf8mb4", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
