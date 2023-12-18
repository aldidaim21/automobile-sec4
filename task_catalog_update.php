<?php
// Include file koneksi dan fungsi query
include 'logic/functions.php';

// Change the database connection details
$conn = mysqli_connect('localhost', 'root', '', 'section4');

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi tambah
    if (task_catalog_update($_POST) > 0) {
        echo "<script>
			alert('Data berhasil ditambahkan!');
			document.location.href='task_catalog.php';
			</script>";
    } else {
        echo "<script>
			alert('Data gagal ditambahkan!');
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
    <title>Tambah Data Task Catalog</title>
</head>

<body>

    <h2>Tambah Data Task Catalog</h2>
    <label for="id">ID</label>
    <input type="text" name="id" required><br>

    <label for="task_name">Task Name:</label>
    <input type="text" name="task_name" required><br>

    <label for="service_catalog_id">Service Catalog ID:</label>
    <input type="text" name="service_catalog_id" required><br>

    <label for="description">Description:</label>
    <textarea name="description"></textarea><br>

    <label for="ref_interval">Reference Interval:</label>
    <input type="text" name="ref_interval" required><br>

    <label for="ref_interval_min">Reference Interval Min:</label>
    <input type="text" name="ref_interval_min" required><br>

    <label for="ref_interval_max">Reference Interval Max:</label>
    <input type="text" name="ref_interval_max" required><br>

    <label for="describe">Describe:</label>
    <input type="text" name="describe" required><br>

    <label for="task_price">Task Price:</label>
    <input type="text" name="task_price" required><br>

    <label for="is_active">Is Active:</label>
    <input type="text" name="is_active" required><br>

    <input type="submit" name="submit" value="Tambah">
    </form>

</body>

</html>