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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h2>Update Data Offer Services</h2>
        <form action="update_offer_services.php?id=<?= $id; ?>" method="POST">
            <input type="hidden" name="id" value="<?= $ofs["id"]; ?>">

            <div class="mb-3">
                <label for="customer_id" class="form-label">Customer ID:</label>
                <input type="text" name="customer_id" value="<?= $ofs["customer_id"]; ?>" readonly class="form-control">
            </div>

            <div class="mb-3">
                <label for="contact_id" class="form-label">Contact ID:</label>
                <input type="text" name="contact_id" value="<?= $ofs["contact_id"]; ?>" readonly class="form-control">
            </div>

            <div class="mb-3">
                <label for="offer_description" class="form-label">Offer Description:</label>
                <input type="text" name="offer_description" value="<?= $ofs["offer_description"]; ?>" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="service_catalog_id" class="form-label">Service Catalog</label>
                <select name="service_catalog_id" required class="form-select">
                    <?php
                    $sc = query("SELECT * FROM service_catalog");
                    foreach ($sc as $row2) :
                        $selected = ($row2['id'] == $ofs['service_catalog_id']) ? 'selected' : '';
                    ?>
                        <option value="<?= $row2['id']; ?>" <?= $selected; ?>><?= $row2['id']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="service_discount" class="form-label">Service Discount:</label>
                <input type="text" name="service_discount" value="<?= $ofs["service_discount"]; ?>" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="offer_price" class="form-label">Offer Price:</label>
                <input type="text" name="offer_price" value="<?= $ofs["offer_price"]; ?>" required class="form-control">
            </div>

            <div class="mb-3">
                <input type="submit" name="submit" value="Konfirmasi Perubahan Data" class="btn btn-success">
            </div>
        </form>
    </div>

</body>

</html>