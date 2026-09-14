<?php
require_once '../config/koneksi.php';
/** @var PDO $pdo */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $serial_number  = trim($_POST['serial_number'] ?? '');
    $nama_barang    = trim($_POST['nama_barang'] ?? '');
    $jenis_barang   = trim($_POST['jenis_barang'] ?? '');
    $kuantitas_stok = (int)($_POST['kuantitas_stok'] ?? 0);
    $harga          = (float)($_POST['harga'] ?? 0);
    $id_gudang      = !empty($_POST['id_gudang']) ? (int)$_POST['id_gudang'] : null;
    $id_vendor      = !empty($_POST['id_vendor']) ? (int)$_POST['id_vendor'] : null;

    if (!empty($serial_number) && !empty($nama_barang)) {
        $query = "INSERT INTO inventory (serial_number, nama_barang, jenis_barang, kuantitas_stok, harga, id_gudang, id_vendor) 
                  VALUES (:serial_number, :nama_barang, :jenis_barang, :kuantitas_stok, :harga, :id_gudang, :id_vendor)";
        $stmt  = $pdo->prepare($query);
        $stmt->execute([
            ':serial_number'  => $serial_number,
            ':nama_barang'    => $nama_barang,
            ':jenis_barang'   => $jenis_barang,
            ':kuantitas_stok' => $kuantitas_stok,
            ':harga'          => $harga,
            ':id_gudang'      => $id_gudang,
            ':id_vendor'      => $id_vendor
        ]);
    }
}

// Redirect kembali ke dashboard setelah simpan
header('Location: ../views/index.php');
exit;