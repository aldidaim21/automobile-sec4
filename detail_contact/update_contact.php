<?php
// Include file koneksi dan fungsi query
include '../functions.php';

// Ambil ID dari parameter GET
$id = $_GET["id"];

// Query data customer
$cust = query("SELECT * FROM customer WHERE id = $id")[0];
$cty = query("SELECT * FROM forfk");
$sc = query("SELECT * FROM forfk2");
$det = query("SELECT * FROM contact WHERE id = $id")[0];

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi update_contact dengan parameter $id
    if (update_contact($_POST) > 0) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Contact</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="update_contact.php?id=<?= $id; ?>" method="post">
            <!-- Hapus input untuk ID -->
            <input type="hidden" name="id" value="<?= $id; ?>">

            <div class="mb-3 mt-3">
                <label for="contact_type_id" class="form-label">Contact Type ID</label>
                <select class="form-select" name="contact_type_id">
                    <?php foreach ($cty as $baris) : ?>
                        <option value="<?= $baris["contact_type_id"]; ?>"><?= $baris["contact_type_id"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="customer_id" class="form-label">Customer ID</label>
                <input type="text" name="customer_id" value="<?= $cust["id"]; ?>" readonly class="form-control">
            </div>

            <div class="mb-3 mt-3">
                <label for="schedule_id" class="form-label">Schedule ID</label>
                <select class="form-select" name="schedule_id">
                    <?php foreach ($sc as $row) : ?>
                        <option value="<?= $row["schedule_id"]; ?>"><?= $row["schedule_id"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="contact_details" class="form-label">Contact Details</label>
                <input type="text" name="contact_details" value="<?= $det["contact_details"]; ?>" required class="form-control">
            </div>

            <input type="submit" name="submit" value="Konfirmasi Perubahan Data" class="btn btn-success">
        </form>
    </div>
</body>

</html>