<?php
// Include file koneksi dan fungsi query
include '../functions.php';
$id = $_GET["id"];
$conn = mysqli_connect('localhost', 'root', '', 'section4');
$ofs = query("SELECT * FROM offer_services WHERE id = $id")[0];
$tsc = query("SELECT * FROM task_catalog WHERE id = $id")[0];
// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi tambah
    if (tambah_ot($_POST) > 0) {
        echo "<script>
			alert('Data Berhasil Ditambahkan!');
			document.location.href='oft.php';
			</script>";
    } else {
        echo "<script>
			alert('Data Gagal Ditambahkan!');
			document.location.href='oft.php';
			</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Offer & Services</title>
</head>

<body>

    <h2>Tambah Data Offer Services</h2>
    <form action="tambah_oft.php" method="post">
        <label for="id">id</label>
        <input type="text" name="id" required><br>


        <label for="offer_id">Offer ID:</label>
        <input type="text" name="Offer ID" required><?php echo $ofs["id"] ?><br>

        <label for="task_catalog_id">Task Catalog ID:</label>
        <input type="text" name="task_catalog_id" required><?php echo $tsc["id"] ?><br>

        <label for="task_price">Task Price:</label>
        <input type="text" name="task_price" required><br>

        <input type="submit" name="submit" value="Tambah">
    </form>

</body>

</html>