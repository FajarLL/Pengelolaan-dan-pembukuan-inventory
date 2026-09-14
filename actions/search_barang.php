<?php
require_once '../config/koneksi.php';
/** @var PDO $pdo */

$keyword = trim($_GET['keyword'] ?? '');

$query = "SELECT i.*, s.nama_gudang, v.nama AS nama_vendor 
          FROM inventory i 
          LEFT JOIN storage_unit s ON i.id_gudang = s.id_gudang 
          LEFT JOIN vendor v ON i.id_vendor = v.id_vendor 
          WHERE i.nama_barang LIKE :keyword OR i.serial_number LIKE :keyword";

$stmt = $pdo->prepare($query);
$stmt->execute([':keyword' => "%$keyword%"]);
$items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Hasil Pencarian: "<?= htmlspecialchars($keyword) ?>"</h2>
        <a href="../views/index.php" class="btn btn-secondary">&larr; Kembali ke Dashboard</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Serial Number</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Gudang</th>
                        <th>Vendor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($items) > 0): ?>
                        <?php foreach ($items as $item): ?>
                            <tr class="<?= $item['kuantitas_stok'] == 0 ? 'table-danger' : '' ?>">
                                <td><strong><?= htmlspecialchars($item['serial_number']) ?></strong></td>
                                <td><?= htmlspecialchars($item['nama_barang']) ?></td>
                                <td><span class="badge bg-info text-dark"><?= htmlspecialchars($item['jenis_barang']) ?></span></td>
                                <td>
                                    <?= htmlspecialchars($item['kuantitas_stok']) ?>
                                    <?php if ($item['kuantitas_stok'] == 0): ?>
                                        <span class="badge bg-danger ms-1">Alert: Stok Habis!</span>
                                    <?php endif; ?>
                                </td>
                                <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                                <td><?= htmlspecialchars($item['nama_gudang'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($item['nama_vendor'] ?? '-') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-3 text-muted">Tidak ada barang yang cocok dengan kata kunci tersebut.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>