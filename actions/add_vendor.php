<?php
require_once '../config/koneksi.php';
/** @var PDO $pdo */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama        = trim($_POST['nama'] ?? '');
    $kontak      = trim($_POST['kontak'] ?? '');
    $nama_barang = trim($_POST['nama_barang'] ?? '');

    if (!empty($nama) && !empty($kontak)) {
        $query = "INSERT INTO vendor (nama, kontak, nama_barang) VALUES (:nama, :kontak, :nama_barang)";
        $stmt  = $pdo->prepare($query);
        $stmt->execute([
            ':nama'        => $nama,
            ':kontak'      => $kontak,
            ':nama_barang' => $nama_barang
        ]);
    }
}

// Redirect kembali ke dashboard setelah simpan
header('Location: ../views/index.php');
exit;