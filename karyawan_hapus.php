<?php
	include("sess_check.php");
		$id = $_GET['npwp'];	
		$sql = "DELETE FROM employee WHERE npwp='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: karyawan.php?act=delete&msg=success");
?>