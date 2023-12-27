<?php
require '../functions.php';
$offers = query("SELECT * FROM offer_task");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offer Task</title>
    <!--boostrap--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--css--->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style3.css">

</head>

<body>
    <!-- Your Navbar Code -->
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
                        <a class="nav-link" href="../task_catalog/task_catalog.php">Task Catalog</a>
                        <a class="nav-link" href="../service_catalog/service.php">Service Catalog</a>
                        <a class="nav-link" href="oft.php">Offer Task</a>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container all">

        <div class="d-flex justify-content-between align-items-center mb-4 big">
            <h2>Offer Task List</h2>
            <a class="btn btn-primary" href="tambah_oft.php">TAMBAH DATA</a>
        </div>
        <div class="container mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Offer ID</th>
                        <th>Task Catalog ID</th>
                        <th>Task Price</th>
                        <th>Timestamp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($offers as $row) : ?>
                        <tr>
                            <td><?= $row["id"]; ?></td>
                            <td><?= $row["offer_id"]; ?></td>
                            <td><?= $row["task_catalog_id"]; ?></td>
                            <td><?= $row["task_price"]; ?></td>
                            <td><?= $row["insert_ts"]; ?></td>
                            <td>
                                <a href="update_oft.php?id=<?= $row["id"]; ?>" class="btn btn-primary">UPDATE</a>
                                <a href="delete_oft.php?id=<?= $row["id"]; ?>" class="btn btn-danger" role="button" aria-pressed="true" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>