    <!-- logic php -->
    <?php
    // Menggunakan file functions.php yang berisi fungsi-fungsi penting

    require 'functions.php';

    // Mengambil semua data dari tabel 'customer'
    $users1 = query("SELECT * FROM customer");

    // Mengambil semua data dari tabel 'contact'
    $cont = query("SELECT * FROM contact");

    // Mengambil data gabungan dari tabel 'customer' dan 'contact' berdasarkan customer_id
    $join = query("SELECT contact.contact_details, customer.first_name, customer.mobile FROM customer JOIN contact ON customer.id = contact.customer_id;");

    // Mengambil data gabungan dari tabel 'customer', 'offer_services', dan 'service_catalog'
    $join2 = query("
        SELECT
            offer_services.offer_description,
            offer_services.id,
            customer.first_name,
            service_catalog.service_name
        FROM
            customer
        JOIN
            offer_services ON customer.id = offer_services.customer_id
        JOIN
            service_catalog ON service_catalog.id = offer_services.service_catalog_id;
    ");


    // menghitung jumlah data 
    $totalCustomers = countData('customer');
    $totalCatalog = countData('service_catalog');
    $totalTask = countData('task_catalog');
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <!-- fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">


        <!-- my css -->
        <link rel="stylesheet" href="css/style2.css">

        <!-- javascript -->
        <script type="text/javascript" src="web/js/jquery-1.9.0.min.js"></script>
        <script type="text/javascript" src="web/js/jquery.nivo.slider.js"></script>
        <script type="text/javascript"></script>

        <title>Automobile</title>
        <link rel="icon" href="web/img/title.gif" type="icon">
    </head>

    <body>
        <!-- navbar -->

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">Automobile<span>.ID</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            <a class="nav-link" href="task_catalog/task_catalog.php">Task Catalog</a>
                            <a class="nav-link" href="service_catalog/service.php">Service Catalog</a>
                            <a class="nav-link" href="offer_task/oft.php">Offer Task</a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- end navbar -->

        <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Real <span> Man <br></span><span> Real </span> Bike</h1>
            </div>
        </div>
        <!-- akhir jumbotron -->


        <!-- container 1 -->
        <div class="container">

            <!-- list data  -->
            <div class="data ">
                <div class="row">

                    <!-- Customer Box -->
                    <div class="col-md-4">
                        <div class="info-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                            </svg>
                            <h3>Customers Total Data</h3>
                            <p><?php echo $totalCustomers; ?></p>
                        </div>
                    </div>

                    <!-- Contact Box -->
                    <div class="col-md-4">
                        <div class="info-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hammer" viewBox="0 0 16 16">
                                <path d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z" />
                            </svg>
                            <h3>Service Catalog Total Data</h3>
                            <p><?php echo $totalCatalog; ?></p>
                        </div>
                    </div>

                    <!-- Offer Services Box -->
                    <div class="col-md-4">
                        <div class="info-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
                                <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                                <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5M9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z" />
                            </svg>
                            <h3>Task Catalog Total Data</h3>
                            <p><?php echo $totalTask; ?></p>
                        </div>
                    </div>

                </div>
            </div>



            <div class="container customer-list">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Customers List</h1>
                    <!-- Button to add new customer -->
                    <a href="customers/tambah_cust.php" class="btn btn-primary" type="button">Add New Customer</a>
                </div>

                <!-- table of customers -->
                <table class="table customer-table">
                    <thead class="table-dark">
                        <tr>
                            <th class="id">ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Customer Actions</th>
                            <th>Contact Actions</th>
                            <th>Add Offer Services</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users1 as $row) : ?>
                            <tr>
                                <td class="id"><?= $row["id"]; ?></td>
                                <td><?= $row["first_name"]; ?></td>
                                <td><?= $row["last_name"]; ?></td>
                                <td>
                                    <a href="customers/update_cust.php?id=<?= $row["id"]; ?>" class="btn btn-sm btn-primary">Update</a>
                                    <a href="customers/delete_cust.php?id=<?php echo $row["id"] ?>" class="btn btn-sm btn-danger" role="button" aria-pressed="true" onclick="return confirm('Apa Anda yakin untuk menghapus data customer?');">Delete</a>
                                    <a href="customers/detail_cust.php?id=<?= $row["id"]; ?>" class="btn btn-sm btn-dark">Detail Customers</a>
                                </td>
                                <td>
                                    <a href="detail_contact/tambah_contact.php?id=<?= $row["id"]; ?>" class="btn btn-sm btn-warning">Add Detail Contact</a>
                                    <a href="detail_contact/update_contact.php?id=<?= $row["id"]; ?>" class="btn btn-sm btn-warning">Update Detail Contact</a>
                                </td>
                                <td>
                                    <a href="offer_services/tambah_offer_services.php?id=<?= $row["id"]; ?>" class="btn btn-sm btn-success">Add Offer Service</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Contact List -->
            <div class="container contact-list">
                <h1>Contact List</h1>
                <div class="row">

                    <?php foreach ($join as $row) : ?>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <h3 class="card-header"><?= $row["first_name"]; ?></h2>
                                    <div class="card-body">
                                        <p class="card-text">Mobile Contact: <?= $row["mobile"]; ?></p>
                                        <p class="card-text">Detail Contact: <?= $row["contact_details"]; ?></p>
                                    </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <!-- offer service list -->
            <div class="container offer-services-list">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Offer Services List</h1>
                </div>

                <!-- table of offer services -->
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Name Customer</th>
                            <th>Id offer service</th>
                            <th>Offer Description</th>
                            <th>Services Name</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($join2 as $row) : ?>
                            <tr>
                                <td><?= $row["first_name"]; ?></td>
                                <td><?= $row["id"]; ?></td>
                                <td><?= $row["offer_description"]; ?></td>
                                <td><?= $row["service_name"]; ?></td>
                                <td>
                                    <a href="offer_services/detailofs.php?id=<?= $row["id"]; ?>" class="btn btn-dark">Detail Offer Services</a>
                                    <a href="offer_services/update_offer_services.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Update Offer Services</a>
                                    <a href="offer_services/delete_offer_services.php?id=<?= $row["id"]; ?>" class="btn btn-danger" role="button" aria-pressed="true" onclick="return confirm('yakin');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>




        </div>









        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
    </body>

    </html>