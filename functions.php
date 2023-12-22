<?php

$conn = mysqli_connect("localhost", "root", "", "section4");


// cek koneksi database	 
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}



// menampilkan  query database
function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


// Fungsi Tambah customers
function tambah($data)
{
	global $conn;

	// untukmendapatkan waktu sekarang

	// get form dari script html
	$id = htmlspecialchars($data["id"]);
	$first_name = htmlspecialchars($data["first_name"]);
	$last_name = htmlspecialchars($data["last_name"]);
	$company_name = htmlspecialchars($data["company_name"]);
	$address = htmlspecialchars($data["address"]);
	$mobile = htmlspecialchars($data["mobile"]);
	$email = htmlspecialchars($data["email"]);
	$detail = htmlspecialchars($data["detail"]);

	$query = "INSERT INTO customer
				VALUES
				('$id','$first_name', '$last_name', '$company_name','$address', '$mobile', '$email', '$detail', current_timestamp())
			 ";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


// hapus customer
function hapus_cust($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM customer WHERE id = $id");
	return mysqli_affected_rows($conn);
}

//update customers
// Fungsi edit data
function update_cust($data)
{
	global $conn;

	$id = $data["id"];
	$first_name = htmlspecialchars($data["first_name"]);
	$last_name = htmlspecialchars($data["last_name"]);
	$company_name = htmlspecialchars($data["company_name"]);
	$address = htmlspecialchars($data["address"]);
	$mobile = htmlspecialchars($data["mobile"]);
	$email = htmlspecialchars($data["email"]);
	$detail = htmlspecialchars($data["detail"]);

	$query = "UPDATE customer SET
                first_name = '$first_name', 
                last_name = '$last_name', 
                company_name = '$company_name', 
                address = '$address', 
                mobile = '$mobile',
                email = '$email', 
                detail = '$detail',
                insert_ts = current_timestamp()
                WHERE id = $id";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// tambah  service_catalog
function tambah_layanan($data)
{
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$service_name = htmlspecialchars($data["service_name"]);
	$description = htmlspecialchars($data["description"]);
	$service_discount = htmlspecialchars($data["service_discount"]);
	$is_active = htmlspecialchars($data["is_active"]);

	$query = "INSERT INTO service_catalog 
                VALUES
                ('$id', '$service_name', '$description', '$service_discount', '$is_active')
             ";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


// Menghapus layanan dari tabel service_catalog
function hapus_layanan($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM service_catalog WHERE id = $id");
	return mysqli_affected_rows($conn);
}

// Memperbarui informasi layanan di tabel service_catalog
function update_layanan($data)
{
	global $conn;

	$id = $data["id"];
	$service_name = htmlspecialchars($data["service_name"]);
	$description = htmlspecialchars($data["description"]);
	$service_discount = htmlspecialchars($data["service_discount"]);
	$is_active = htmlspecialchars($data["is_active"]);

	$query = "UPDATE service_catalog SET
                service_name = '$service_name', 
                description = '$description', 
                service_discount = '$service_discount', 
                is_active = '$is_active'
                WHERE id = $id";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


// Menambah fungsi untuk tabel contact
function tambah_contact($data)
{
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$contact_type_id = htmlspecialchars($data["contact_type_id"]);
	$customer_id = htmlspecialchars($data["customer_id"]);
	$schedule_id = htmlspecialchars($data["schedule_id"]);
	$contact_details = htmlspecialchars($data["contact_details"]);

	$query = "INSERT INTO contact
			VALUES
			('$id',
			'$contact_type_id',
			'$customer_id',
			'$schedule_id',
			'$contact_details', 
			current_timestamp())
			";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
function hapus_contact($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM contact WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function update_contact($data)
{
	global $conn;

	$id = $data["id"];
	$contact_type_id = htmlspecialchars($data["contact_type_id"]);
	$customer_id = htmlspecialchars($data["customer_id"]);
	$schedule_id = htmlspecialchars($data["schedule_id"]);
	$contact_details = htmlspecialchars($data["contact_details"]);

	$query = "UPDATE contact SET
                contact_type_id = '$contact_type_id', 
                customer_id = '$customer_id', 
                schedule_id = '$schedule_id', 
                contact_details = '$contact_details'
                WHERE id = $id";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// Fungsi Tambah task_catalog
function task_catalog_tambah($data)
{
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$task_name = htmlspecialchars($data["task_name"]);
	$service_catalog_id = htmlspecialchars($data["service_catalog_id"]);
	$description = htmlspecialchars($data["description"]);
	$ref_interval = htmlspecialchars($data["ref_interval"]);
	$ref_interval_min = htmlspecialchars($data["ref_interval_min"]);
	$ref_interval_max = htmlspecialchars($data["ref_interval_max"]);
	$describe = htmlspecialchars($data["describe"]);
	$task_price = htmlspecialchars($data["task_price"]);
	$is_active = htmlspecialchars($data["is_active"]);

	$query = "INSERT INTO task_catalog
				VALUES
				('$id', '$task_name', '$service_catalog_id', '$description', '$ref_interval', '$ref_interval_min', '$ref_interval_max', '$describe', '$task_price', '$is_active')
			 ";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// Fungsi hapus
function task_catalog_delete($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM task_catalog WHERE id = $id");
	return mysqli_affected_rows($conn);
}

// Fungsi update data Task Catalog
function task_catalog_update($data, $id)
{
	global $conn;

	$task_name = htmlspecialchars($data["task_name"]);
	$service_catalog_id = htmlspecialchars($data["service_catalog_id"]);
	$description = htmlspecialchars($data["description"]);
	$ref_interval = htmlspecialchars($data["ref_interval"]);
	$ref_interval_min = htmlspecialchars($data["ref_interval_min"]);
	$ref_interval_max = htmlspecialchars($data["ref_interval_max"]);
	$describe = htmlspecialchars($data["describe"]);
	$task_price = htmlspecialchars($data["task_price"]);
	$is_active = htmlspecialchars($data["is_active"]);

	$query = "UPDATE task_catalog SET
                task_name = '$task_name',
                service_catalog_id = '$service_catalog_id',
                description = '$description',
                ref_interval = '$ref_interval',
                ref_interval_min = '$ref_interval_min',
                ref_interval_max = '$ref_interval_max',
                `describe` = '$describe',
                task_price = '$task_price',
                is_active = '$is_active'
                WHERE id = $id";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// Function Offer Service

function tambah_os($data)
{
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$customer_id = htmlspecialchars($data["customer_id"]);
	$contact_id = htmlspecialchars($data["contact_id"]);
	$offer_description = htmlspecialchars($data["offer_description"]);
	$service_catalog_id = htmlspecialchars($data["service_catalog_id"]);
	$service_discount = htmlspecialchars($data["service_discount"]);
	$offer_price = htmlspecialchars($data["offer_price"]);

	$query = "INSERT INTO offer_services
				VALUES
				('$id','$customer_id', '$contact_id', '$offer_description','$service_catalog_id', '$service_discount', '$offer_price', current_timestamp())
			 ";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function delete_os($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM offer_services WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function update_os($data)
{
	global $conn;

	$id = $data["id"];
	$customer_id = htmlspecialchars($data["customer_id"]);
	$contact_id = htmlspecialchars($data["contact_id"]);
	$offer_description = htmlspecialchars($data["offer_description"]);
	$service_catalog_id = htmlspecialchars($data["service_catalog_id"]);
	$service_discount = htmlspecialchars($data["service_discount"]);
	$offer_price = htmlspecialchars($data["offer_price"]);

	$query = "UPDATE offer_services SET
                customer_id = '$customer_id', 
				contact_id = '$contact_id', 
            	offer_description = '$offer_description', 
                service_catalog_id = '$service_catalog_id',
				service_discount = $service_discount',
				offer_price = $offer_price
                WHERE id = $id";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


function tambah_ot($data)
{
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$offer_id = htmlspecialchars($data["offer_id"]);
	$task_catalog_id = htmlspecialchars($data["task_catalog_id"]);
	$task_price = htmlspecialchars($data["task_price"]);

	$query = "INSERT INTO offer_task
				VALUES
				('$id', '$offer_id','$task_catalog_id', '$task_price', current_timestamp())
			 ";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function delete_ot($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM offer_task WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function update_ot($data)
{
	global $conn;

	$id = $data["id"];
	$offer_id = htmlspecialchars($data["offer_id"]);
	$task_catalog_id = htmlspecialchars($data["task_catalog_id"]);
	$task_price = htmlspecialchars($data["task_price"]);

	$query = "UPDATE offer_task SET
				offer_id = '$offer_id', 
            	task_catalog_id = '$task_catalog_id', 
				task_price = $task_price
                WHERE id = $id";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
