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
			document.location.href='../index.php';
			</script>

	";
    } else {
        echo "
            <script>
            alert('Data gagal diubah!');
            document.location.href='../index.php';
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

    <div class="container judul">
        <h2 class="judul teks">Mengubah Data Customer</h2>
    </div>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="id" class="form-control" value="<?= $cust["id"]; ?>" readonly>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?= $cust["first_name"]; ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?= $cust["last_name"]; ?>">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="company_name" class="form-label">Company</label>
                <input type="text" name="company_name" class="form-control" value="<?= $cust["company_name"]; ?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="<?= $cust["address"]; ?>">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" name="mobile" class="form-control" value="<?= $cust["mobile"]; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $cust["email"]; ?>">
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Detail</label>
                <input type="text" name="detail" class="form-control" value="<?= $cust["detail"]; ?>">
            </div>

            <div class="form-group text-center">
                <button type="submit" name="submit" class="btn btn-success">Konfirmasi Perubahan Data</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>