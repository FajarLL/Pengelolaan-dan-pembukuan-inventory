<lin<?php
require_once '../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Vendor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="mb-3">
        <a href="index.php" class="btn btn-sm btn-secondary">&larr; Kembali ke Dashboard</a>
    </div>

    <div class="card shadow-sm col-md-8 mx-auto">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Form Tambah Vendor / Supplier</h4>
        </div>
        <div class="card-body">
            <form action="../actions/add_vendor.php" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Perusahaan Vendor</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh: PT Maju Bersama" required>
                </div>
                <div class="mb-3">
                    <label for="kontak" class="form-label">Nomor Telepon / Kontak</label>
                    <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Contoh: 081234567890" required>
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Barang Utama yang Disediakan</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Contoh: Peralatan Komputer" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Vendor</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>