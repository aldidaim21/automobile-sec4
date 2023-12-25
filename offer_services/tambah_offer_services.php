<?php
// Include file koneksi dan fungsi query
include '../functions.php';

// Ambil ID dari parameter GET
$id = $_GET["id"];

// Query data customer
$cust = query("SELECT * FROM customer WHERE id = $id")[0];
$conts = query("SELECT * FROM contact WHERE customer_id = $id")[0];
$sc = query("SELECT * FROM service_catalog");

// Pemeriksaan apakah contact_id kosong
if (empty($conts["id"])) {
    echo "<script>
            alert('Isi tabel contact terlebih dahulu!');
            document.location.href='../index.php';
          </script>";
    exit; // Hentikan eksekusi kode selanjutnya jika contact_id kosong
}

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi tambah_contact dengan parameter $id
    if (tambah_os($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href='../index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
                document.location.href='../.php';
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
    <form action="tambah_offer_services.php?id=<?= $id; ?>" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" required><br>

        <label for="customer_id">Customer ID:</label>
        <input type="text" name="customer_id" value="<?= $cust["id"]; ?>" readonly><br>

        <label for="contact_id">Contact ID:</label>
        <input type="text" name="contact_id" value="<?= $conts["id"]; ?>" readonly><br>

        <label for="offer_description">Offer Description:</label>
        <input type="text" name="offer_description" required><br>

        <label for="service_catalog_id">Service Catalog</label>
        <select name="service_catalog_id" required>
            <?php foreach ($sc as $row2) : ?>
                <option value="<?= $row2['id']; ?>"><?= $row2['id']; ?></option>
            <?php endforeach ?>
        </select><br>

        <label for="service_discount">Service Discount:</label>
        <input type="text" name="service_discount" required><br>

        <label for="offer_price">Offer Price:</label>
        <input type="text" name="offer_price" required><br>

        <input type="submit" name="submit" value="Tambah">
    </form>

</body>

</html>