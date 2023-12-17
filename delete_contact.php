<?php

include 'logic/functions.php';

$id = $_GET["id"];

if (hapus_contact($id) > 0) {
    echo "
			<script>
			alert('Data berhasil dihapus!');
			document.location.href='contact.php';
			</script>

	";
} else {
    echo "
			<script>
			alert('Data gagal dihapus!');
			document.location.href='contact.php';
			</script>

	";
}
