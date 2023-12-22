<?php
include '../functions.php';
// ambil data di url
$id = $_GET["id"];
// query data customer 
$ofs = query("SELECT * FROM offer_services WHERE id = $id")[0];

// cek apakah tombol submit 
if (isset($_POST["submit"])) {

    if (update_os($_POST) > 0) {
        echo "
			<script>
			alert('Data berhasil diubah!');
			document.location.href='ofs.php';
			</script>

	";
    } else {
        echo "
            <script>
            alert('Data gagal diubah!');
            document.location.href='ofs.php';
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
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $ofs["id"]; ?>">
        <input type="text" name="customer_id" value="<?= $ofs["customer_id"]; ?>">
        <input type="text" name="contact_id" value="<?= $ofs["contact_id"]; ?>">
        <input type="text" name="offer_description" value="<?= $ofs["offer_description"]; ?>">
        <input type="text" name="service_catalog_id" value="<?= $ofs["service_catalog_id"]; ?>">
        <input type="text" name="service_discount" value="<?= $ofs["service_discount"]; ?>">
        <input type="text" name="offer_price" value="<?= $ofs["offer_price"]; ?>">
        <div class="form-group  center">
            <button type="submit" name="submit">Submit</button>
        </div>

</head>

<body>

</body>

</html>