<?php
require_once '../config/koneksi.php';
/** @var PDO $pdo */

// 1. Ambil data Gudang untuk dropdown pilihan lokasi gudang
$stmtGudang = $pdo->prepare("SELECT id_gudang, nama_gudang FROM storage_unit ORDER BY nama_gudang ASC");
$stmtGudang->execute();
$gudangList = $stmtGudang->fetchAll();

// 2. Ambil data Vendor untuk dropdown pilihan supplier/vendor
$stmtVendor = $pdo->prepare("SELECT id_vendor, nama FROM vendor ORDER BY nama ASC");
$stmtVendor->execute();
$vendorList = $stmtVendor->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Barang - Form Tambah Barang</title>
    <!-- Framework CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4 mb-5">
    <!-- Tombol Kembali ke Dashboard -->
    <div class="mb-3">
        <a href="index.php" class="btn btn-sm btn-secondary">&larr; Kembali ke Dashboard</a>
    </div>

    <!-- Card Form Input Barang -->
    <div class="card shadow-sm col-md-8 mx-auto">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Form Tambah Barang Baru</h4>
        </div>
        <div class="card-body">
            <form action="../actions/add_barang.php" method="POST">
                
                <!-- Serial Number -->
                <div class="mb-3">
                    <label for="serial_number" class="form-label">Serial Number / Barcode Unik</label>
                    <input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="Contoh: SN-LPT-001" required>
                </div>

                <!-- Nama Barang -->
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Contoh: Laptop Asus ExpertBook" required>
                </div>

                <!-- Jenis / Kategori Barang -->
                <div class="mb-3">
                    <label for="jenis_barang" class="form-label">Jenis / Kategori Barang</label>
                    <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" placeholder="Contoh: Elektronik, ATK, Makanan, dll." required>
                </div>

                <!-- Kuantitas Stok & Harga -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kuantitas_stok" class="form-label">Kuantitas Stok</label>
                        <input type="number" class="form-control" id="kuantitas_stok" name="kuantitas_stok" min="0" value="0" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="harga" class="form-label">Harga Barang (Rp)</label>
                        <input type="number" class="form-control" id="harga" name="harga" min="0" step="1000" placeholder="Contoh: 150000" required>
                    </div>
                </div>

                <!-- Dropdown Pilihan Gudang -->
                <div class="mb-3">
                    <label for="id_gudang" class="form-label">Lokasi Gudang Penyimpanan</label>
                    <select class="form-select" id="id_gudang" name="id_gudang" required>
                        <option value="">-- Pilih Gudang --</option>
                        <?php foreach ($gudangList as $gudang): ?>
                            <option value="<?= $gudang['id_gudang'] ?>">
                                <?= htmlspecialchars($gudang['nama_gudang']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Dropdown Pilihan Vendor -->
                <div class="mb-3">
                    <label for="id_vendor" class="form-label">Vendor / Supplier</label>
                    <select class="form-select" id="id_vendor" name="id_vendor" required>
                        <option value="">-- Pilih Vendor --</option>
                        <?php foreach ($vendorList as $vendor): ?>
                            <option value="<?= $vendor['id_vendor'] ?>">
                                <?= htmlspecialchars($vendor['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Tombol Submit -->
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">Simpan Barang</button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>