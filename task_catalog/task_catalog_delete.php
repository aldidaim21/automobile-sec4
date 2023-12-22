<?php

include '../functions.php';

$id = $_GET["id"];

if (task_catalog_delete($id) > 0) {
	echo "
			<script>
			alert('Data Berhasil Dihapus!');
			document.location.href='task_catalog.php';
			</script>

	";
} else {
	echo "
			<script>
			alert('Data Gagal Dihapus!');
			document.location.href='task_catalog.php';
			</script>

	";
}
