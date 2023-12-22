<?php
include '../functions.php';
// ambil data di url
$id = $_GET["id"];
// query data offer task
$oft = query("SELECT * FROM offer_task WHERE id = $id")[0];

// cek apakah tombol submit 
if (isset($_POST["submit"])) {

    if (update_os($_POST) > 0) {
        echo "
			<script>
			alert('Data Berhasil Diubah!');
			document.location.href='oft.php';
			</script>

	";
    } else {
        echo "
            <script>
            alert('Data Gagal Diubah!');
            document.location.href='oft.php';
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
        <input type="hidden" name="id" value="<?= $oft["id"]; ?>">
        <input type="text" name="offer_id" value="<?= $oft["offer_id"]; ?>">
        <input type="text" name="task_catalog_id" value="<?= $oft["task_catalog_id"]; ?>">
        <input type="text" name="task_price" value="<?= $oft["task_price"]; ?>">
        <div class="form-group  center">
            <button type="submit" name="submit">Submit</button>
        </div>

</head>

<body>

</body>

</html>