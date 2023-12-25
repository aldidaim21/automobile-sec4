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
</head>

<body>

    <h2>Tambah Data Tugas Katalog</h2>
    <form action="task_catalog_tambah.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" required><br>

        <label for="task_name">Nama Tugas:</label>
        <input type="text" name="task_name" required><br>

        <label for="service_catalog_id">ID Katalog Layanan:</label>
        <select name="service_catalog_id" required>
            <?php foreach ($sc as $row) : ?>
                <option value="<?= $row['id']; ?>"><?= $row['id']; ?></option>
            <?php endforeach ?>
        </select><br>

        <label for="description">Deskripsi:</label>
        <textarea type="text" name="description" required></textarea><br>

        <label for="ref_interval">Interval Referensi:</label>
        <input type="text" name="ref_interval" required><br>

        <label for="ref_interval_min">Interval Referensi Minimum:</label>
        <input type="text" name="ref_interval_min" required><br>

        <label for="ref_interval_max">Interval Referensi Maksimum:</label>
        <input type="text" name="ref_interval_max" required><br>

        <label for="describe">Deskripsi Tugas:</label>
        <input type="text" name="describe" required><br>

        <label for="task_price">Harga Tugas:</label>
        <input type="text" name="task_price" required><br>

        <label for="is_active">Aktif:</label>
        <input type="text" name="is_active" required><br>

        <input type="submit" name="submit" value="Tambah">
    </form>

</body>

</html>