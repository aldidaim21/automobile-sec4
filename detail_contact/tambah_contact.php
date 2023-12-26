<?php
// Include file koneksi dan fungsi query
include '../functions.php';

// Ambil ID dari parameter GET
$id = $_GET["id"];

// Query data customer
$cust = query("SELECT * FROM customer WHERE id = $id")[0];
$cty = query("SELECT * FROM forfk");
$sc = query("SELECT * FROM forfk2");

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi tambah_contact dengan parameter $id
    if (tambah_contact($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href='../index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
                document.location.href='../index.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Contact</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="tambah_contact.php?id=<?= $id; ?>" method="post">
            <div class="row">
                <div class="col-6">
                    <label for="first_name">ID</label>
                    <input class="form-control" type="text" value="<?= $id; ?>" name="id" aria-label="readonly input example" readonly>
                </div>
                <div class="col-6">
                    <label for="Contactid">Contact type Id</label>
                    <select class="form-select" aria-label="Default select example" name="contact_type_id">
                        <option selected>Pilih Contact Type</option>
                        <?php foreach ($cty as $baris) : ?>
                            <option value="<?= $baris["contact_type_id"]; ?>"><?= $baris["contact_type_id"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-6">
                <label for="first_name">customer_id</label>
                <input class="form-control" type="text" name="customer_id" value="<?= $cust["id"]; ?>" aria-label="readonly input example" readonly>
            </div>

            <div class="col-6">
                <label for="schedule_id">Pilih Schudle ID</label>
                <select class="form-select" aria-label="Default select example" id="schedule_id" name="schedule_id">
                    <option selected>Pilih Schudle ID</option>
                    <?php foreach ($sc as $row) : ?>
                        <option value="<?= $row["schedule_id"]; ?>"><?= $row["schedule_id"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="contact_details">Contact Details</label>
                <input type="tel" class="form-control" placeholder="Add Your Contact Details " aria-label="Addres" name="contact_details">
            </div>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>

</html>