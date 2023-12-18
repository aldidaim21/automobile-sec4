<?php
require 'logic/functions.php';
$users1 = query("SELECT * FROM customer");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section 4</title>
</head>

<body>
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
            <th>Tambah detail contact</th>
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
                <td><a href="tambah_contact.php?id=<?= $row["id"]; ?>">Tambah detail contact</td>

            </tr>
        <?php endforeach; ?>
    </table>
</body>
<a href="tambah.php">TAMBAH DATA</a>

</html>