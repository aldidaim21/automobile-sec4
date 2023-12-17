<?php
include 'logic/functions.php';
// ambil data di URL
$id = $_GET["id"];
// query data layanan
$layanan = query("SELECT * FROM service_catalog:services & offers WHERE id = $id")[0];

// cek apakah tombol submit 
if (isset($_POST["submit"])) {

    if (update($_POST) > 0) {
        echo "
			<script>
			alert('Data berhasil diubah!');
			document.location.href='index2.php';
			</script>
		";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengubah Data</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $layanan["id"]; ?>">
        <label for="service_name">Service Name:</label>
        <input type="text" name="service_name" value="<?= $layanan["service_name"]; ?>"><br>

        <label for="description">Description:</label>
        <input type="text" name="description" value="<?= $layanan["description"]; ?>"><br>

        <label for="service_discount">Service Discount:</label>
        <input type="text" name="service_discount" value="<?= $layanan["service_discount"]; ?>"><br>

        <label for="is_active">Is Active:</label>
        <input type="text" name="is_active" value="<?= $layanan["is_active"]; ?>"><br>

        <div class="form-group center">
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</body>

</html>
