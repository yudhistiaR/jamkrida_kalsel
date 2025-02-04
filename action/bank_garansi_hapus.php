<?php
	include("../sess_check.php");
		$id = $_GET['id'];	
		$sql = "DELETE FROM jaminan WHERE id='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: ../bank_garansi.php?act=delete&msg=success");
?>