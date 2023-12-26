<?php
// Include file koneksi dan fungsi query
include '../functions.php';
$conn = mysqli_connect('localhost', 'root', '', 'section4');
// Cek apakah form telah di-submit
if (isset($_POST['submit'])) {
    // Panggil fungsi tambah
    if (tambah($_POST) > 0) {
        echo "<script>
			alert('Data berhasil ditambahkan!');
			document.location.href='../index.php';
			</script>";
    } else {
        echo "<script>
			alert('Data gagal ditambahkan!');
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
    <title>Tambah Data Customer</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- my css -->
    <link rel="stylesheet" href="css/style1.css">


</head>

<body>
    <div class="container judul">
        <h2 class="judul teks"> Data Customer</h2> <br>
    </div>

    <div class="container">
        <form action="tambah_cust.php" method="post">
            <div class="mb-3">
                <label for="id">ID</label>
                <input type="text" name="id" required class="form-control" placeholder="ID Customer" aria-label="ID">
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="flotingInput">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="floatingInput" placeholder="First Name">
                </div>
                <div class="col-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Last name" aria-label="Last name">
                </div>
            </div>
            <div class="mt-3 mb-3">
                <label for="first_name">Company</label>
                <input type="text" name="company_name" class="form-control" placeholder="Company Name" aria-label="Company Name">
            </div>
            <div class="mb-3">
                <label for="first_name">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Address Customer " aria-label="Addres">
            </div>
            <div class="mb-3">
                <label for="first_name">Mobile</label>
                <input type="text" name="mobile" class="form-control" placeholder="Mobile Customer" aria-label="Mobile">
            </div>
            <div class="mb-3">
                <label for="first_name">Email</label>
                <input type="email" name="email" class="form-control" placeholder="name@example.com " aria-label="Email Customer">
            </div>
            <div class="mb-3">
                <label for="first_name">Detail</label>
                <input type="text" name="detail" class="form-control" placeholder="Detail Customer" aria-label="Details">
            </div>

            <input type="submit" class="btn btn-success" name="submit" value="Konfirmasi Tambah Data">
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>