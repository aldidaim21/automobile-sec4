<?php
// Include file koneksi dan fungsi query
include '../functions.php';
$conn = mysqli_connect('localhost', 'root', '', 'section4');
$ofs = query("SELECT * FROM offer_services");
$tsc = query("SELECT * FROM task_catalog");
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
    <title>Tambah Data Task</title>
</head>

<body>

    <h2>Tambah Data Offer Task</h2>
    <form action="tambah_oft.php" method="post">
        <label for="id">id</label>
        <input type="text" name="id" required><br>

        <label for="offer_id">Offer Serbice ID:</label>
        <select name="offer_id" required>
            <?php foreach ($ofs as $row) : ?>
                <option value="<?= $row['id']; ?>"><?= $row['id']; ?></option>
            <?php endforeach ?>
        </select><br>

        <label for="task_catalog_id">Task Catalog ID:</label>
        <select name="task_catalog_id" required>
            <?php foreach ($tsc as $row2) : ?>
                <option value="<?= $row2['id']; ?>"><?= $row2['id']; ?></option>
            <?php endforeach ?>
        </select><br>


        <label for="task_price">Task Price:</label>
        <input type="text" name="task_price" required><br>

        <input type="submit" name="submit" value=" Konfirmasi Tambah Data" class="btn btn-success">
    </form>

</body>

</html>