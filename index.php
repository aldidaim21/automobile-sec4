<?php
require 'functions.php';
$users1 = query("SELECT * FROM customer");
$cont = query("SELECT * FROM contact");
$join = query("SELECT contact.contact_details , customer.first_name, customer.mobile FROM customer JOIN contact ON customer.id= contact.customer_id;");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service and Offers </title>
    <!--boostrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--css--->
    <link rel="stylesheet" href="css/style.css" />

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
                    <a class="nav-link" href="#">Customer</a>
                    <a class="nav-link" href="task_catalog/task_catalog.php">Task Catalog</a>
                    <a class="nav-link" href="service_catalog/service.php">Service Catalog</a>
                    <a class="nav-link" href="offer_task/oft.php">Offer Task</a>
                    <a class="nav-link" href="offer_services/ofs.php">Offer Service</a>
                </div>
            </div>
        </div>
    </nav>
    <h2>Customer List</h2>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users1 as $row) : ?>
                    <tr>
                        <td><?= $row["id"]; ?></td>
                        <td><?= $row["first_name"]; ?></td>
                        <td><?= $row["last_name"]; ?></td>
                        <td>
                            <a href="customers/update_cust.php?id=<?= $row["id"]; ?>" class="btn btn-primary">Update</a>
                            <a href="customers/delete_cust.php?id=<?php echo $row["id"] ?>" class="btn btn-danger" role="button" aria-pressed="true" onclick="return confirm('yakin');">Delete</a>
                            <a href="customers/detail_cust.php?id=<?= $row["id"]; ?>" class="btn btn-dark">Detail Customers</a>
                            <a href="detail_contact/tambah_contact.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Add Detail Contact</a>
                            <a href="detail_contact/update_contact.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Update Detail Contact</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Mobile Contact</th>
                    <th>Detail Contact</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($join as $row) : ?>
                    <tr>
                        <td><?= $row["first_name"]; ?></td>
                        <td><?= $row["mobile"]; ?></td>
                        <td><?= $row["contact_details"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</html>