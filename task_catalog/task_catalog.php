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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--- CSS--->
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
                    <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    <a class="nav-link active" href="task_catalog.php">Task Catalog</a>
                    <a class="nav-link" href="../service_catalog/service.php">Service Catalog</a>
                    <a class="nav-link" href="../offer_task/oft.php">Offer Task</a>
                </div>

            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Task Catalog List</h2>
        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
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
        <a class="btn btn-primary" href="task_catalog_tambah.php">TAMBAH DATA</a>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>