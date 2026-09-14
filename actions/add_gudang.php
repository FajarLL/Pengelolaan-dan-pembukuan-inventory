<?php
require_once '../config/koneksi.php';
/** @var PDO $pdo */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_gudang = trim($_POST['nama_gudang'] ?? '');
    $lokasi      = trim($_POST['lokasi'] ?? '');

    if (!empty($nama_gudang) && !empty($lokasi)) {
        $query = "INSERT INTO storage_unit (nama_gudang, lokasi) VALUES (:nama_gudang, :lokasi)";
        $stmt  = $pdo->prepare($query);
        $stmt->execute([
            ':nama_gudang' => $nama_gudang,
            ':lokasi'      => $lokasi
        ]);
    }
}

// Redirect kembali ke dashboard setelah simpan
header('Location: ../views/index.php');
exit;