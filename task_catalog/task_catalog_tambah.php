<?php
// Sertakan file koneksi dan fungsi query
include '../functions.php';
$conn = mysqli_connect('localhost', 'root', '', 'section4');
$sc = query("SELECT * FROM service_catalog");

// Periksa apakah formulir telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi tambah
    if (task_catalog_tambah($_POST) > 0) {
        echo "<script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href='task_catalog.php';
            </script>";
    } else {
        echo "
            <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href='task_catalog.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Tugas Katalog</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Tambah Data Tugas Katalog</h2>
        <form action="task_catalog_tambah.php" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="id" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="task_name" class="form-label">Nama Tugas:</label>
                <input type="text" name="task_name" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="service_catalog_id" class="form-label">ID Katalog Layanan:</label>
                <select name="service_catalog_id" required class="form-select">
                    <?php foreach ($sc as $row) : ?>
                        <option value="<?= $row['id']; ?>"><?= $row['id']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea type="text" name="description" required class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="ref_interval" class="form-label">Interval Referensi:</label>
                <input type="text" name="ref_interval" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="ref_interval_min" class="form-label">Interval Referensi Minimum:</label>
                <input type="text" name="ref_interval_min" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="ref_interval_max" class="form-label">Interval Referensi Maksimum:</label>
                <input type="text" name="ref_interval_max" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="describe" class="form-label">Deskripsi Tugas:</label>
                <input type="text" name="describe" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="task_price" class="form-label">Harga Tugas:</label>
                <input type="text" name="task_price" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">Aktif:</label>
                <input type="text" name="is_active" required class="form-control">
            </div>

            <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
        </form>
    </div>
</body>

</html>