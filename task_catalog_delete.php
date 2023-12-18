<?php

include 'logic/functions.php';

$id = $_GET["id"];

if (task_catalog_delete($id) > 0) {
	echo "
			<script>
			alert('Data berhasil dihapus!');
			document.location.href='task_catalog.php';
			</script>

	";
} else {
	echo "
			<script>
			alert('Data gagal dihapus!');
			document.location.href='task_catalog.php';
			</script>

	";
}
