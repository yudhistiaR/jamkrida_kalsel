<?php
	include("../sess_check.php");
		$id = $_GET['id'];	
		$sql = "DELETE FROM jaminan WHERE id='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: ../kredit_mikro_php.php?act=delete&msg=success");
?>