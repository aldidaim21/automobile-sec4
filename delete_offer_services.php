<?php

include 'logic/functions.php';

$id = $_GET["id"];

if (delete_os($id) > 0) {
    echo "
			<script>
			alert('Data berhasil dihapus!');
			document.location.href='offer_services.php';
			</script>

	";
} else {
    echo "
			<script>
			alert('Data gagal dihapus!');
			document.location.href='offer_services.php';
			</script>

	";
}
