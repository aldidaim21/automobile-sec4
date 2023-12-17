<?php
include 'logic/functions.php';
// ambil data di URL
$id = $_GET["id"];
// query data contact
$contact = query("SELECT * FROM contact WHERE id = $id")[0];

// cek apakah tombol submit 
if (isset($_POST["submit"])) {

    if (update_contact($_POST) > 0) {
        echo "
			<script>
			alert('Data berhasil diubah!');
			document.location.href='contact.php';
			</script>
		";
    } else {
        echo "
            <script>
            alert('Data gagal diubah!');
            document.location.href='contact.php';
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
        <input type="hidden" name="id" value="<?= $contact["id"]; ?>">

        <label for="contact_type_id">Contact Type ID:</label>
        <input type="text" name="contact_type_id" value="<?= $contact["contact_type_id"]; ?>"><br>

        <label for="customer_id">CustomerID :</label>
        <input type="text" name="customer_id" value="<?= $contact["customer_id"]; ?>"><br>

        <label for="schedule_id">Schedule ID:</label>
        <input type="text" name="schedule_id" value="<?= $contact["schedule_id"]; ?>"><br>

        <label for="contact_details">Contact Details:</label>
        <input type="text" name="contact_details" value="<?= $contact["contact_details"]; ?>"><br>

        <div class="form-group center">
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</body>

</html>