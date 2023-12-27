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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--css--->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style3.css">

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
                        <a class="nav-link" href="../task_catalog/task_catalog.php">Task Catalog</a>
                        <a class="nav-link" href="service.php">Service Catalog</a>
                        <a class="nav-link" href="../offer_task/oft.php">Offer Task</a>
                    </div>
                </ul>
            </div>
        </div>
    </nav>




    <div class="container all">

        <div class="d-flex justify-content-between align-items-center mb-4 big">
            <h2>Service List</h2>
            <a class="btn btn-primary" href="tambah_service.php">TAMBAH DATA</a>
        </div>

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
                            $hasil = "Servis Aktif";
                        } else {
                            $hasil = "Servis Tidak Aktif";
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
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>>


</html>