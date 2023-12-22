<?php
// Include file koneksi dan fungsi query
include '../functions.php';

// Change the database connection details
$conn = mysqli_connect('localhost', 'root', '', 'section4');
$ofs = query("SELECT * FROM offer_services WHERE id = $id")[0];

// Ambil ID dari parameter GET
$id = $_GET["id"];

// Query data Task Catalog
$taskCatalog = query("SELECT * FROM task_catalog WHERE id = $id")[0];

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi task_catalog_update dengan parameter $_POST dan $id
    if (task_catalog_update($_POST, $id) > 0) {
        echo "<script>
            alert('Data Berhasil Diupdate!');
            document.location.href='task_catalog.php';
            </script>";
    } else {
        echo "<script>
            alert('Data Gagal Diupdate!');
            document.location.href='task_catalog.php';
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Task Catalog</title>
</head>

<body>

    <h2>Update Data Task Catalog</h2>
    <form action="task_catalog_update.php?id=<?= $id; ?>" method="post">
        <!-- Hapus input untuk ID -->
        <input type="hidden" name="id" value="<?= $id; ?>">

        <label for="task_name">Task Name:</label>
        <input type="text" name="task_name" value="<?= $taskCatalog["task_name"]; ?>" required><br>

        <label for="service_catalog_id">Service Catalog ID:</label>
        <input type="text" name="service_catalog_id" value="<?= $taskCatalog["service_catalog_id"]; ?>" <?php echo $ofs["id"] ?>required><br>

        <label for="description">Description:</label>
        <textarea name="description"><?= $taskCatalog["description"]; ?></textarea><br>

        <label for="ref_interval">Reference Interval:</label>
        <input type="text" name="ref_interval" value="<?= $taskCatalog["ref_interval"]; ?>" required><br>

        <label for="ref_interval_min">Reference Interval Min:</label>
        <input type="text" name="ref_interval_min" value="<?= $taskCatalog["ref_interval_min"]; ?>" required><br>

        <label for="ref_interval_max">Reference Interval Max:</label>
        <input type="text" name="ref_interval_max" value="<?= $taskCatalog["ref_interval_max"]; ?>" required><br>

        <label for="describe">Describe:</label>
        <input type="text" name="describe" value="<?= $taskCatalog["describe"]; ?>" required><br>

        <label for="task_price">Task Price:</label>
        <input type="text" name="task_price" value="<?= $taskCatalog["task_price"]; ?>" required><br>

        <label for="is_active">Is Active:</label>
        <input type="text" name="is_active" value="<?= $taskCatalog["is_active"]; ?>" required><br>

        <input type="submit" name="submit" value="Update">
    </form>

</body>

</html>