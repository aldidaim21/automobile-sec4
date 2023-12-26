<?php
include '../functions.php';
// ambil data di url
$id = $_GET["id"];
// query data offer task
$oft = query("SELECT * FROM offer_task WHERE id = $id")[0];
$ofs = query("SELECT * FROM offer_services");
$tsc = query("SELECT * FROM task_catalog");

// cek apakah tombol submit 
if (isset($_POST["submit"])) {

    if (update_ot($_POST) > 0) {
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
    <title>Mengubah Data offer task</title>


    <form action="update_oft.php?id=<?= $id; ?>" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $oft["id"]; ?>">

        <label for="offer_id">Offer Serbice ID:</label>
        <select name="offer_id" id="offer_id">
            <?php
            foreach ($ofs as $row) {
                $selected = ($row['id'] == $oft["offer_id"]) ? 'selected' : '';
                echo "<option value='{$row['id']}' $selected>{$row['id']}</option>";
            }
            ?>
        </select><br>

        <label for="task_catalog_id">Task Catalog ID:</label>
        <select name="task_catalog_id" id="task_catalog_id">
            <?php
            foreach ($tsc as $row) {
                $selected = ($row['id'] == $oft["task_catalog_id"]) ? 'selected' : '';
                echo "<option value='{$row['id']}' $selected>{$row['id']}</option>";
            }
            ?>
        </select><br>

        <label for="task_price">Task Price:</label>
        <input type="text" name="task_price" value="<?= $oft["task_price"]; ?>">
        <div class="form-group  center">
            <button type="submit" name="submit">Konfirmasi Perubahan Data</button>
        </div>

</head>

<body>

</body>

</html>