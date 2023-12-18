<?php
require 'logic/functions.php';
$tasks = query("SELECT * FROM task_catalog");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section 4</title>
</head>

<body>
    <h2>Task Catalog List</h2>
    <table border="1">
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
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php foreach ($tasks as $row) : ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["task_name"]; ?></td>
                <td><?php echo $row["service_catalog_id"]; ?></td>
                <td><?php echo $row["description"]; ?></td>
                <td><?php echo $row["ref_interval"]; ?></td>
                <td><?php echo $row["ref_interval_min"]; ?></td>
                <td><?php echo $row["ref_interval_max"]; ?></td>
                <td><?php echo $row["describe"]; ?></td>
                <td><?php echo $row["task_price"]; ?></td>
                <td><?php echo $row["is_active"]; ?></td>

                <td><a href="task_catalog_delete.php?id=<?php echo $row["id"] ?>" class="btn btn-primary btn-sm active btn-dark ml-5" role="button" aria-pressed="true" onclick="return confirm('yakin');">Delete</a></td>

                <td><a href="task_catalog_update.php?id=<?= $row["id"]; ?>">UPDATE</a></td>

            </tr>
        <?php endforeach; ?>
    </table>
    <a href="task_catalog_tambah.php">TAMBAH DATA</a>
</body>

</html>