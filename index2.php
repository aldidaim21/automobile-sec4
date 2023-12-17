<?php
require 'logic/functions.php';
$layanan = query("SELECT * FROM service_catalog:services & offers");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bagian 4</title>
</head>

<body>
    <h2>Katalog Layanan</h2>
    <table border="1">
        <tr>
        <th>ID</th>
            <th>Service Name</th>
            <th>Description</th>
            <th>Service Discount</th>
            <th>Is Active</th>
            <th>Action</th>
        </tr>
        <?php foreach ($layanan as $baris) : ?>
            <tr>
                <td><?php echo $baris["id"]; ?></td>
                <td><?php echo $baris["service_name"]; ?></td>
                <td><?php echo $baris["description"]; ?></td>
                <td><?php echo $baris["service_discount"]; ?></td>
                <td><?php echo $baris["is_active"]; ?></td>
                <td>
                    <a href="delete2.php?id=<?php echo $baris["id"] ?>" class="btn btn-primary btn-sm active btn-dark ml-5" role="button" aria-pressed="true" onclick="return confirm('Apakah Anda yakin?');">Hapus</a>
                    <a href="update2.php?id=<?= $baris["id"]; ?>">Perbarui</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="tambah2.php">Tambah Layanan Baru</a>
</body>

</html>
