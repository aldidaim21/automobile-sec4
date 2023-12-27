<?php
include '../functions.php';
// ambil data di url
$id = $_GET["id"];
// query data customer 
$cust = query("SELECT * FROM customer WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail <?php echo $cust["first_name"] ?></title>

    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="css/style3.css">

</head>

<body>

    </div>
    </div>
    <div class="container mt-5">
        <div class="card text-bg-dark mb-3">
            <div class="card-header ">
                <strong> Detail Customer </strong>
            </div>

            <div class="card-body">
                <!-- Nama sebagai h1 -->
                <h1 class="card-title mb-4" style="text-transform: uppercase;"><?php echo $cust["first_name"] ?><?php echo $cust["last_name"] ?></h1>

                <!-- Biodata menggunakan kombinasi h2, p, dan Bootstrap classes -->
                <h2>ID: <span class="text-muted"><?php echo $cust["id"] ?></span></h2>
                <h2>Company: <span class="text-muted"><?php echo $cust["company_name"] ?></span></h2>
                <br>
                <p><strong>Address:</strong> <?php echo $cust["address"] ?></p>
                <p><strong>Mobile:</strong> <?php echo $cust["mobile"] ?></p>
                <p><strong>Email:</strong> <?php echo $cust["email"] ?></p>
                <p><strong>Deskripsi:</strong> <?php echo $cust["detail"] ?></p>

                <br> <a href="../index.php" class="btn btn-dark">Back to Home Page</a>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
</body>

</html>