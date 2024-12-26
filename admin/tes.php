

<?php
include '../koneksi.php';

$id = $_GET["id_admin"];
//query data berdasarkan id
$sqlGet = "SELECT * FROM tb_admin WHERE id_admin = '$id'";
$queryGet = mysqli_query($conn, $sqlGet);
$data = mysqli_fetch_array($queryGet);

?>

<form action="" method="POST" enctype="multipart/form-data" >

    <div class="mb-3">
    <label for="video" class="form-label">YT</label>
    <input type="text" class="form-control"  name="video" id="video" value="<?php echo $data['video']; ?>">
  </div>
    <div class="mb-3">
    <label for="logo" class="form-label">Logo</label>
    <input type="text" class="form-control"  name="logo" id="logo" value="<?php echo $data['logo']; ?>">
  </div>

    <div class="mb-3"><button class="btn btn-primary" type="submit" name="submit">Ubah</button></div>
    
</form>
<?php 
if (isset($_POST['submit'])){
  $video       = $_POST["video"];
  $logo       = $_POST["logo"];


$sqlUpdate = "UPDATE tb_admin
              SET video='$video', logo='$logo'
              WHERE id_admin = '$id'";
$query= mysqli_query($conn, $sqlUpdate);


if( isset($_POST["submit"]) ) {
	if(($_POST)>0 ) {	
    echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'setting.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'setting.php';
			</script>
		";
	}
}
}
?>
