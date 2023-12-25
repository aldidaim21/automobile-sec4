<?php
include '../functions.php';

$id = $_GET["id"];
$ofs = query("SELECT * FROM offer_services WHERE id = $id")[0];

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi update_contact dengan parameter $id
    if (update_os($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Diupdate!');
                document.location.href='../index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal Diupdate!');
                document.location.href='../index.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>

<body>

    <h2>Update Data Offer Services</h2>
    <form action="update_offer_services.php?id=<?= $id; ?>" method="POST">
        <input type="hidden" name="id" value="<?= $ofs["id"]; ?>">

        <label for="customer_id">Customer ID:</label>
        <input type="text" name="customer_id" value="<?= $ofs["customer_id"]; ?>" readonly><br>

        <label for="contact_id">Contact ID:</label>
        <input type="text" name="contact_id" value="<?= $ofs["contact_id"]; ?>" readonly><br>

        <label for="offer_description">Offer Description:</label>
        <input type="text" name="offer_description" value="<?= $ofs["offer_description"]; ?>" required><br>

        <label for="service_catalog_id">Service Catalog</label>
        <select name="service_catalog_id" required>
            <?php
            $sc = query("SELECT * FROM service_catalog");
            foreach ($sc as $row2) :
                $selected = ($row2['id'] == $ofs['service_catalog_id']) ? 'selected' : '';
            ?>
                <option value="<?= $row2['id']; ?>" <?= $selected; ?>><?= $row2['id']; ?></option>
            <?php endforeach ?>
        </select><br>

        <label for="service_discount">Service Discount:</label>
        <input type="text" name="service_discount" value="<?= $ofs["service_discount"]; ?>" required><br>

        <label for="offer_price">Offer Price:</label>
        <input type="text" name="offer_price" value="<?= $ofs["offer_price"]; ?>" required><br>

        <div class="form-group center">
            <input type="submit" name="submit" value="Update">
        </div>
    </form>

</body>

</html>