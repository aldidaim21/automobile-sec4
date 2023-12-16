<?php

$conn = mysqli_connect('localhost', 'root', '', 'section4');

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
	$first_name = htmlspecialchars($data["first_name"]);
	$last_name = htmlspecialchars($data["last_name"]);
	$company_name = htmlspecialchars($data["company_name"]);
	$address = htmlspecialchars($data["address"]);
	$mobile = htmlspecialchars($data["mobile"]);
	$email = htmlspecialchars($data["email"]);
	$detail = htmlspecialchars($data["detail"]);
	
	$query = "INSERT INTO customer
				VALUES
				('','$first_name', '$last_name', '$company_name','$address', '$mobile', '$email', '$detail', current_timestamp())
			 ";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
	echo "Pernyataan SQL: $query";
}
function update($data)
{
	global $conn;

	$first_name = htmlspecialchars($data["first_name"]);
	$last_name = htmlspecialchars($data["last_name"]);
	$company_name = htmlspecialchars($data[""]);
	$address = htmlspecialchars($data["address"]);
	$mobile = htmlspecialchars($data[""]);
	$email = htmlspecialchars($data["email"]);
	$detail = htmlspecialchars($data[""]);

	$query = "UPDATE customer SET
				first_name = $first_name, last_name = $last_name, company_name = $company_name, address = $address, mobile = $mobile. email = $email, detail = $detail";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
	echo "Pernyataan SQL: $query;"	
}