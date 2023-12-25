<?php
require '../functions.php';
$services = query("SELECT * FROM service_catalog");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Catalog </title>
    <!--boostrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--css--->
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
                    <a class="nav-link" href="../task_catalog/task_catalog.php">Task Catalog</a>
                    <a class="nav-link active" href="service.php">Service Catalog</a>
                    <a class="nav-link" href="../offer_task/oft.php">Offer Task</a>
                </div>

            </div>
        </div>
    </nav>
    <h2>Service List</h2>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Service Discount</th>
                    <th>Is Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $row) : ?>
                    <?php
                    if ($row["is_active"] == 1) {
                        $hasil = "servis aktif";
                    } else {
                        $hasil = "servis tidak aktif";
                    }
                    ?>
                    <tr>
                        <td><?= $row["id"]; ?></td>
                        <td><?= $row["service_name"]; ?></td>
                        <td><?= $row["description"]; ?></td>
                        <td><?= $row["service_discount"]; ?></td>
                        <td><?= $hasil; ?></td>
                        <td>
                            <a href="update_service.php?id=<?= $row["id"]; ?>" class="btn btn-primary">UPDATE</a>
                            <a href="delete_service.php?id=<?= $row["id"]; ?>" class="btn btn-danger" role="button" aria-pressed="true" onclick="return confirm('yakin');">Delete</a>
                            <!-- Tambahkan aksi lainnya sesuai kebutuhan -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <a class="btn" href="tambah_service.php">TAMBAH DATA</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</html>