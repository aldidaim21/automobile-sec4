<?php
include '../functions.php';
// ambil data di url
$id = $_GET["id"];
// query data customer 
$cust = query("SELECT * FROM customer WHERE id = $id")[0];

// cek apakah tombol submit 
if (isset($_POST["submit"])) {

    if (update_cust($_POST) > 0) {
        echo "
			<script>
			alert('Data berhasil diubah!');
			document.location.href='index.php';
			</script>

	";
    } else {
        echo "
            <script>
            alert('Data gagal diubah!');
            document.location.href='index.php';
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
        <input type="hidden" name="id" value="<?= $cust["id"]; ?>">
        <input type="text" name="first_name" value="<?= $cust["first_name"]; ?>">
        <input type="text" name="last_name" value="<?= $cust["last_name"]; ?>">
        <input type="text" name="company_name" value="<?= $cust["company_name"]; ?>">
        <input type="text" name="address" value="<?= $cust["address"]; ?>">
        <input type="text" name="mobile" value="<?= $cust["mobile"]; ?>">
        <input type="text" name="email" value="<?= $cust["email"]; ?>">
        <input type="text" name="detail" value="<?= $cust["detail"]; ?>">
        <div class="form-group  center">
            <button type="submit" name="submit">Submit</button>
        </div>

</head>

<body>

</body>

</html>