<?php
require 'logic/functions.php';
$contact = query("SELECT * FROM contact");


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
            <th>Contact Type ID</th>
            <th>Customer ID</th>
            <th>Schedule ID</th>
            <th>Contact Details</th>
            <th>Delete</th>
            <th>Update</th>
            <th>Contact</th>
        </tr>
        <?php foreach ($contact as $row) : ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["contact_type_id"]; ?></td>
                <td><?php echo $row["customer_id"]; ?></td>
                <td><?php echo $row["schedule_id"]; ?></td>
                <td><?php echo $row["contact_details"]; ?></td>

                <td><a href="delete_contact.php?id=<?php echo $row["id"] ?>" class="btn btn-primary btn-sm active btn-dark ml-5" role="button" aria-pressed="true" onclick="return confirm('yakin');">Delete</a></td>

                <td><a href="update_contact.php?id=<?= $row["id"]; ?>">UPDATE</td>
                <td><a href="tambah_contact.php?id=<?= $row["id"]; ?>">UPDATE</td>


            </tr>
        <?php endforeach; ?>
    </table>
    <a href="tambah_contact.php">Tambah Info Contact</a>
</body>

</html>