<?php
require '../functions.php';
// Ambil ID dari parameter GET
$id = $_GET["id"];

// Query data Offer Services berdasarkan ID
$offer = query("SELECT * FROM offer_services WHERE id = $id")[0];
$usd = $offer["customer_id"];
$users1 = query("SELECT * FROM customer WHERE id =$usd  ")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Offer Services</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="card text mb-3">
            <div class="card-header ">
                <strong> Detail Offer Service </strong>
            </div>

            <div class="card-body">
                <h3>ID: <span class="text-muted"><?= $offer["id"]; ?></span></h3>
                <h3>Customer ID: <span class="text-muted"><?= $offer["customer_id"]; ?></span></h3>
                <h3>Customer Name: <span class="text-muted"><?= $users1["first_name"]; ?></span></h3>
                <br>
                <p>Contact ID: <span class="text-muted"><?= $offer["contact_id"]; ?></span></p>
                <p>Offer Description: <span class="text-muted"><?= $offer["offer_description"]; ?></span></p>
                <p>Service Catalog ID: <span class="text-muted"><?= $offer["service_catalog_id"]; ?></span></p>
                <p>Service Discount: <span class="text-muted"><?= $offer["service_discount"]; ?></span></p>
                <p>Offer Price: <span class="text-muted"><?= $offer["offer_price"]; ?></span></p>
                <p>Waktu Pembuatan Data: <span class="text-muted"><?= $offer["insert_ts"]; ?></span></p>

                <br> <a href="../index.php" class="btn btn-dark">Back to Home Page</a>
            </div>

        </div>

        <!-- Bootstrap JS and Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>