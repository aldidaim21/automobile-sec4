<?php
include '../functions.php';
// ambil data di URL
$id = $_GET["id"];
// query data layanan
$layanan = query("SELECT * FROM service_catalog WHERE id = $id")[0];

// cek apakah tombol submit 
if (isset($_POST["submit"])) {

    if (update_layanan($_POST) > 0) {
        echo "
			<script>
			alert('Data berhasil diubah!');
			document.location.href='service.php';
			</script>
		";
    } else {
        echo "
            <script>
            alert('Data gagal diubah!');
            document.location.href='service.php';
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style1.css">

</head>

<body>
    <div class="container">
        <h2>Mengubah Data Layanan</h2> <br>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="service_name">Service Name:</label>
                <input type="text" name="service_name" class="form-control" value="<?= $layanan["service_name"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="description">Description:</label>
                <input type="text" name="description" class="form-control" value="<?= $layanan["description"]; ?>">
            </div>

            <div class="mb-3">
                <label for="service_discount">Service Discount:</label>
                <input type="text" name="service_discount" class="form-control" value="<?= $layanan["service_discount"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="is_active">Is Active:</label>
                <input type="text" name="is_active" class="form-control" value="<?= $layanan["is_active"]; ?>" required>
            </div>

            <div class="form-group text-center">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>