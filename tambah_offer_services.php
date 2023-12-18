<?php
// Include file koneksi dan fungsi query
include 'logic/functions.php';
$id = $_GET["id"];
$conn = mysqli_connect('localhost', 'root', '', 'section4');
$cus = query("SELECT * FROM customer WHERE id = $id")[0];
$con = query("SELECT * FROM contact WHERE id = $id")[0];
$ser = query("SELECT * FROM service_catalog WHERE id = $id")[0];
// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi tambah
    if (tambah_os($_POST) > 0) {
        echo "<script>
			alert('Data berhasil ditambahkan!');
			document.location.href='offer_services.php';
			</script>";
    } else {
        echo "<script>
			alert('Data gagal ditambahkan!');
			document.location.href='offer_services.php';
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
    <form action="tambah_offer_services.php" method="post">
        <label for="first_name">id</label>
        <input type="text" name="id" required><br>


        <label for="customer_id">Customer ID:</label>
        <input type="text" name="Customer ID" required><?php echo $cus["id"] ?><br>

        <label for="contact_id">Contact ID:</label>
        <input type="text" name="contact_id" required><br>

        <label for="offer_description">Offer Description:</label>
        <input type="text" name="offer_description" required><br>

        <label for="service_catalog_id">Service Catalog Id</label>
        <input type="text" name="service_catalog_id" required><br>

        <label for="service_discount">Service Discount:</label>
        <input type="text" name="service_discount" required><br>

        <label for="offer_price">Offer Price:</label>
        <input type="offer_price" name="offer_price" required><br>

        <input type="submit" name="submit" value="Tambah">
    </form>

</body>

</html>