<?php
require 'logic/functions.php';
$layanan = query("SELECT * FROM service_catalog");


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
        <?php foreach ($layanan as $row) :

            // logic layanan ketika aktif dan tidak aktif
            if ($row["is_active"] == 1) {
                $result = "aktif";
            } else {
                $result = "Tidak aktif";
            } ?>

            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["service_name"]; ?></td>
                <td><?php echo $row["description"]; ?></td>
                <td><?php echo $row["service_discount"]; ?></td>
                <td><?php echo $result ?></td>
                <td>
                    <a href="delete_layanan.php?id=<?php echo $row["id"] ?>" class="btn btn-primary btn-sm active btn-dark ml-5" role="button" aria-pressed="true" onclick="return confirm('Apakah Anda yakin?');">Hapus</a>
                    <a href="update_layanan.php?id=<?= $row["id"]; ?>">Perbarui</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="tambah_layanan.php">Tambah Layanan Baru</a>
</body>

</html>