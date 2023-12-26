<?php
// Include file koneksi dan fungsi query
include '../functions.php';

// Change the database connection details
$conn = mysqli_connect('localhost', 'root', '', 'section4');
// Ambil ID dari parameter GET
$id = $_GET["id"];

// Query data Task Catalog
$taskCatalog = query("SELECT * FROM task_catalog WHERE id = $id")[0];
$det = query("SELECT * FROM service_catalog");

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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Update Data Task Catalog</h2>
        <form action="task_catalog_update.php?id=<?= $id; ?>" method="post">
            <!-- Hapus input untuk ID -->
            <input type="hidden" name="id" value="<?= $id; ?>">

            <div class="mb-3">
                <label for="task_name" class="form-label">Task Name:</label>
                <input type="text" name="task_name" value="<?= $taskCatalog["task_name"]; ?>" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="service_catalog_id" class="form-label">Service Catalog ID:</label>
                <select name="service_catalog_id" id="service_catalog_id" class="form-select">
                    <?php
                    foreach ($det as $row) {
                        $selected = ($row['id'] == $taskCatalog["service_catalog_id"]) ? 'selected' : '';
                        echo "<option value='{$row['id']}' $selected>{$row['id']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" class="form-control"><?= $taskCatalog["description"]; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="ref_interval" class="form-label">Reference Interval:</label>
                <input type="text" name="ref_interval" value="<?= $taskCatalog["ref_interval"]; ?>" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="ref_interval_min" class="form-label">Reference Interval Min:</label>
                <input type="text" name="ref_interval_min" value="<?= $taskCatalog["ref_interval_min"]; ?>" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="ref_interval_max" class="form-label">Reference Interval Max:</label>
                <input type="text" name="ref_interval_max" value="<?= $taskCatalog["ref_interval_max"]; ?>" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="describe" class="form-label">Describe:</label>
                <input type="text" name="describe" value="<?= $taskCatalog["describe"]; ?>" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="task_price" class="form-label">Task Price:</label>
                <input type="text" name="task_price" value="<?= $taskCatalog["task_price"]; ?>" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">Is Active:</label>
                <input type="text" name="is_active" value="<?= $taskCatalog["is_active"]; ?>" required class="form-control">
            </div>

            <input type="submit" name="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
</body>

</html>