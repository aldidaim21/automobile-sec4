<?php
// Include file koneksi dan fungsi query
include '../functions.php';

$conn = mysqli_connect('localhost', 'root', '', 'section4');

// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi tambah
    if (tambah_layanan($_POST) > 0) {
        echo "<script>
			alert('Data berhasil ditambahkan!');
			document.location.href='service.php';
			</script>";
    } else {
        echo "<script>
			alert('Data gagal ditambahkan!');
			document.location.href='service.php';
			</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Layanan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- my css -->
    <link rel="stylesheet" href="css/style1.css">

</head>

<body>
    <div class="container">
        <h2>Tambah Data Layanan</h2> <br>

        <form action="tambah_service.php" method="post">
            <div class="mb-3">
                <label for="service_name">ID</label>
                <input type="text" name="id" class="form-control" placeholder="ID Service" aria-label="ID" required>
            </div>

            <div class="mb-3">
                <label for="service_name">Service Name</label>
                <input type="text" name="service_name" class="form-control" placeholder="Service Name" aria-label="Service" required>
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="Description Service" aria-label="Desc"></textarea>
            </div>

            <div class="mb-3">
                <label for="service_discount">Service Discount</label>
                <input type="text" name="service_discount" class="form-control" placeholder="Service Discount" aria-label="Discount" required>
            </div>

            <div class="mb-3">
                <label for="is_active">Is Active</label>
                <input type="text" name="is_active" class="form-control" placeholder="Active Service" aria-label="Active" required>
            </div>


            <input type="submit" class="btn btn-success" name="submit" value="Konfirmasi Tambah Data">
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>