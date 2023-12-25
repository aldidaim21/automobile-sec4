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
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Automobile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="../index.php">Customer</a>
                    <a class="nav-link" href="../task_catalog/task_catalog.php">Task Catalog</a>
                    <a class="nav-link" href="../service_catalog/service.php">Service Catalog</a>
                    <a class="nav-link" href="../offer_task/oft.php">Offer Task</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="mb-4">Detail Offer Services</h1>
        <h2>ID: <span class="text-muted"><?= $offer["id"]; ?></span></h2>
        <h2>Customer ID: <span class="text-muted"><?= $offer["customer_id"]; ?></span></h2>
        <h2>Customer Name <span class="text-muted"><?= $users1["first_name"]; ?></span></h2>
        <h2>Contact ID: <span class="text-muted"><?= $offer["contact_id"]; ?></span></h2>
        <h2>Offer Description: <span class="text-muted"><?= $offer["offer_description"]; ?></span></h2>
        <h2>Service Catalog ID: <span class="text-muted"><?= $offer["service_catalog_id"]; ?></span></h2>
        <h2>Service Discount: <span class="text-muted"><?= $offer["service_discount"]; ?></span></h2>
        <h2>Offer Price: <span class="text-muted"><?= $offer["offer_price"]; ?></span></h2>
        <h2>Waktu Pembuatan Data: <span class="text-muted"><?= $offer["insert_ts"]; ?></span></h2>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>