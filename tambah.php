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
			document.location.href='index.php';
			</script>";
    } else {
        echo "<script>
			alert('Data gagal ditambahkan!');
			document.location.href='index.php';
			</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Customer</title>
</head>

<body>

    <h2>Tambah Data Customer</h2>
    <form action="tambah.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label for="company_name">Company Name:</label>
        <input type="text" name="company_name" required><br>

        <label for="address">Address</label>
        <input type="text" name="address" required><br>

        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="detail">Detail:</label>
        <textarea name="detail"></textarea><br>

        <input type="submit" name="submit" value="Tambah">
    </form>

</body>

</html>