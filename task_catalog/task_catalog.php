<?php
require '../functions.php';
$tasks = query("SELECT * FROM task_catalog");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Catalog List</title>

    <!--boostrap--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--css--->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style3.css">
    <link rel="stylesheet" href="../css/style4.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">


            <a class="navbar-brand" href="../index.php">Automobile<span>.ID</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        <a class="nav-link" href="task_catalog.php">Task Catalog</a>
                        <a class="nav-link" href="../service_catalog/service.php">Service Catalog</a>
                        <a class="nav-link" href="../offer_task/oft.php">Offer Task</a>
                    </div>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container task mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Task Catalog List</h2>
            <a class="btn btn-primary" href="task_catalog_tambah.php">TAMBAH DATA</a>
        </div>


        <div class="container mt-5">
            <table class="table table-bordered">
                <thead> <!-- Add dark background to the table header -->
                    <tr>
                        <th>ID</th>
                        <th>Task Name</th>
                        <th>Service Catalog ID</th>
                        <th>Description</th>
                        <th>Reference Interval</th>
                        <th>Reference Interval Min</th>
                        <th>Reference Interval Max</th>
                        <th>Describe</th>
                        <th>Task Price</th>
                        <th>Is Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $row) : ?>
                        <tr>
                            <td><?= $row["id"]; ?></td>
                            <td><?= $row["task_name"]; ?></td>
                            <td><?= $row["service_catalog_id"]; ?></td>
                            <td><?= $row["description"]; ?></td>
                            <td><?= $row["ref_interval"]; ?></td>
                            <td><?= $row["ref_interval_min"]; ?></td>
                            <td><?= $row["ref_interval_max"]; ?></td>
                            <td><?= $row["describe"]; ?></td>
                            <td><?= $row["task_price"]; ?></td>
                            <td><?= $row["is_active"]; ?></td>
                            <td>
                                <a href="task_catalog_delete.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm" role="button" onclick="return confirm('yakin');">Delete</a>
                                <a href="task_catalog_update.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">Update</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>