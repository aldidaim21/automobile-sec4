<?php
// Include file koneksi dan fungsi query
include 'logic/functions.php';

$conn = mysqli_connect('localhost', 'root', '', 'section4');

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi tambah
    if (tambah($_POST) > 0) {
        echo "<script>
			alert('Data berhasil ditambahkan!');
			document.location.href='index2.php';
			</script>";
    } else {
        echo "<script>
			alert('Data gagal ditambahkan!');
			document.location.href='index2.php';
			</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Layanan</title>
</head>

<body>

    <h2>Tambah Data Layanan</h2>
    <form action="tambah2.php" method="post">
        <label for="service_name">ID</label>
        <input type="text" name="id" required><br>

        <label for="service_name">Service Name:</label>
        <input type="text" name="service_name" required><br>

        <label for="description">Description:</label>
        <textarea name="description"></textarea><br>

        <label for="service_discount">Service Discount:</label>
        <input type="text" name="service_discount" required><br>

        <label for="is_active">Is Active:</label>
        <input type="text" name="is_active" required><br>

        <input type="submit" name="submit" value="Tambah">
    </form>

</body>

</html>
