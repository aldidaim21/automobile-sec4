<?php
// Include file koneksi dan fungsi query
include 'logic/functions.php';
$conn = mysqli_connect('localhost', 'root', '', 'section4');
$id = $_GET["id"];
// query data customer 
$cust = query("SELECT * FROM customer WHERE id = $id")[0];
$cty = query("SELECT * FROM forfk");
$sc = query("SELECT * FROM forfk2");


// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi tambah
    if (tambah_contact($_POST) > 0) {
        echo "<script>
			alert('Data berhasil ditambahkan!');
			document.location.href='contact.php';
			</script>";
    } else {
        echo "<script>
			alert('Data gagal ditambahkan!');
			document.location.href='contact.php';
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

    <h2>Tambah Data Contact</h2>
    <form action="tambah_contact.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" required><br>

        <label for=" contact_type_id">Contact Type ID:</label>
        <select>
            <?php foreach ($cty as $baris) : ?>
                <option name="contact_type_id" value="<?php echo $baris["contact_type_id"]; ?>"><?php echo $baris["contact_type_id"]; ?></option>
            <?php endforeach ?>
        </select><br>
        <input type="text" name="contact_type_id" required><br>

        <label for="customer_id">Customer ID:</label>
        <input type="text" name="customer_id" value="<?php echo $cust["id"]; ?>"><br>

        <label for="">Schedule ID</label>
        <select>
            <?php foreach ($sc as $row) : ?>
                <option name="schedule_id" value="<?php echo $row["schedule_id"]; ?>"><?php echo $row["schedule_id"]; ?></option>
            <?php endforeach ?>
        </select><br>

        <label for="contact_details">Contact Details:</label>
        <input type="text" name="contact_details" required><br>

        <input type="submit" name="submit" value="Tambah">
    </form>

</body>

</html>