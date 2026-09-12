<lin<?php
require_once '../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="mb-3">
        <a href="index.php" class="btn btn-sm btn-secondary">&larr; Kembali ke Dashboard</a>
    </div>

    <div class="card shadow-sm col-md-8 mx-auto">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Form Tambah Gudang Baru</h4>
        </div>
        <div class="card-body">
            <form action="../actions/add_gudang.php" method="POST">
                <div class="mb-3">
                    <label for="nama_gudang" class="form-label">Nama Gudang</label>
                    <input type="text" class="form-control" id="nama_gudang" name="nama_gudang" placeholder="Contoh: Gudang Cabang Surabaya" required>
                </div>
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi / Alamat Gudang</label>
                    <textarea class="form-control" id="lokasi" name="lokasi" rows="3" placeholder="Masukkan alamat lengkap gudang..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Gudang</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
