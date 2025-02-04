<?php 
require_once("dist/config/koneksi.php");
// code user username availablity
if(!empty($_POST["id"])) {
	$npp= $_POST["id"];
	$sql = "SELECT * FROM suretybond WHERE id='$npp'";
	$query = mysqli_query($conn,$sql);
	if(mysqli_num_rows($query)>0){
		echo "<span style='color:red'> NPP sudah terdaftar.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}else{
		echo "<span style='color:green'> NPP bisa digunakan.</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

?>
