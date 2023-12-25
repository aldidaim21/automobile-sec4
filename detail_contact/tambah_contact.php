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
                document.location.href='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
                document.location.href='index.php';
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
</head>

<body>

    <form action="tambah_contact.php?id=<?= $id; ?>" method="post">

        <!-- Hapus input untuk ID -->
        <label for="contact_type_id">ID Contact:</label>
        <input type="text" name="id" value="<?= $id; ?>" readonly><br>

        <label for="contact_type_id">Contact Type ID:</label>
        <select name="contact_type_id">
            <?php foreach ($cty as $baris) : ?>
                <option value="<?= $baris["contact_type_id"]; ?>"><?= $baris["contact_type_id"]; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="customer_id">Customer ID:</label>
        <input type="text" name="customer_id" value="<?= $cust["id"]; ?>" readonly><br>

        <label for="schedule_id">Schedule ID:</label>
        <select name="schedule_id">
            <?php foreach ($sc as $row) : ?>
                <option value="<?= $row["schedule_id"]; ?>"><?= $row["schedule_id"]; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="contact_details">Contact Details:</label>
        <input type="text" name="contact_details" required><br>

        <input type="submit" name="submit" value="Tambah">
    </form>

</body>

</html>