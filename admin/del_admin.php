<?php 
require '../function.php';
$id = $_GET["id_login"];

if( hapus_admin ($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'data_login.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'data_login.php';
		</script>
	";
}

?>