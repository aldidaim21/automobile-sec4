<?php
require '../functions.php';
$offers = query("SELECT * FROM offer_services");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offer Services</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Your CSS file (if any) -->
    <link rel="stylesheet" href="../css/style.css">
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
    <h2>Offer Services List</h2>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer ID</th>
                    <th>Contact ID</th>
                    <th>Offer Description</th>
                    <th>Service Catalog ID</th>
                    <th>Service Discount</th>
                    <th>Offer Price</th>
                    <th>Insert Timestamp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offers as $row) : ?>
                    <tr>
                        <td><?= $row["id"]; ?></td>
                        <td><?= $row["customer_id"]; ?></td>
                        <td><?= $row["contact_id"]; ?></td>
                        <td><?= $row["offer_description"]; ?></td>
                        <td><?= $row["service_catalog_id"]; ?></td>
                        <td><?= $row["service_discount"]; ?></td>
                        <td><?= $row["offer_price"]; ?></td>
                        <td><?= $row["insert_ts"]; ?></td>
                        <td>
                            <a href="update_offer.php?id=<?= $row["id"]; ?>" class="btn btn-primary">UPDATE</a>
                            <a href="delete_offer.php?id=<?= $row["id"]; ?>" class="btn btn-danger" role="button" aria-pressed="true" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a class="btn" href="tambah_offer_services.php">TAMBAH DATA</a>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>