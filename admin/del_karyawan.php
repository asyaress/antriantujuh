<?php 
require 'functionkaryawan.php';
$id = $_GET["id_karyawan"];

if( hapus ($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'data_login_karyawan.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'data_login_karyawan.php';
		</script>
	";
}

?>