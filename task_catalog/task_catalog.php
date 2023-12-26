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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--- CSS--->
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <!-- Your Navbar Code -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Automobile.ID</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="5" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Automobile.ID</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1 pe-1">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="task_catalog/task_catalog.php">Task Catalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../service_catalog/service.php">Service Catalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../offer_task/oft.php">Offer Task</a>
                        </li>
                    </ul>
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

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>