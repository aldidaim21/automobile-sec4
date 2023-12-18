<?php
require 'logic/functions.php';
$users1 = query("SELECT * FROM customer");
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
    <link rel="stylesheet" href="asset/style.css" />

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
                    <a class="nav-link" href="#">Task Catalog</a>
                    <a class="nav-link" href="#">Service Catalog</a>
                    <a class="nav-link" href="#">Offer Task</a>
                </div>
            </div>
        </div>
    </nav>
    <h2>Customer List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company Name</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Detail</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php foreach ($users1 as $row) : ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["first_name"]; ?></td>
                <td><?php echo $row["last_name"]; ?></td>
                <td><?php echo $row["company_name"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["mobile"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["detail"]; ?></td>

                <td><a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-primary btn-sm active btn-dark ml-5" role="button" aria-pressed="true" onclick="return confirm('yakin');">Delete</a></td>

                <td><a href="update.php?id=<?= $row["id"]; ?>">UPDATE</td>

            </tr>
        <?php endforeach; ?>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<a href="tambah.php">TAMBAH DATA</a>

</html>