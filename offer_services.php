<?php
require 'logic/functions.php';
$contact = query("SELECT * FROM offer_services");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bagian 4</title>
</head>

<body>
    <h2>Detail Contact</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Customer ID</th>
            <th>Contact ID</th>
            <th>Offer Description</th>
            <th>Service Catalog ID</th>
            <th>Service Discount</th>
            <th>Offer Price</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php foreach ($offer_services as $row) : ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["customer_id"]; ?></td>
                <td><?php echo $row["contact_id"]; ?></td>
                <td><?php echo $row["offer_description"]; ?></td>
                <td><?php echo $row["service_catalog_id"]; ?></td>
                <td><?php echo $row["service_discount"]; ?></td>
                <td><?php echo $row["offer_price"]; ?></td>

                <td><a href="delete_offer_services.php?id=<?php echo $row["id"] ?>" class="btn btn-primary btn-sm active btn-dark ml-5" role="button" aria-pressed="true" onclick="return confirm('Yakin');">Delete</a></td>

                <td><a href="update_offer_services.php?id=<?= $row["id"]; ?>">UPDATE</td>
                <td><a href="tambah_offer_services.php?id=<?= $row["id"]; ?>">TAMBAH</td>


            </tr>
        <?php endforeach; ?>
    </table>
    <a href="tambah_offer_services.php">Tambah Info Contact</a>
</body>

</html>