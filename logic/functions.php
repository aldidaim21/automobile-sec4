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

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM customer WHERE id = $id");
	return mysqli_affected_rows($conn);
}

// Fungsi edit data
function update($data)
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
