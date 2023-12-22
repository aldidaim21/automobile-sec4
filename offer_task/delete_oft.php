<?php

include '../functions.php';

$id = $_GET["id"];

if (delete_os($id) > 0) {
    echo "
			<script>
			alert('Data Berhasil Dihapus!');
			document.location.href='oft.php';
			</script>

	";
} else {
    echo "
			<script>
			alert('Data Gagal Dihapus!');
			document.location.href='oft.php';
			</script>

	";
}
