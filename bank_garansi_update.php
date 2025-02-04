<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$id=$_POST['id'];
		$nama_agen=$_POST['nama_agen'];
		$nama_perusahaan=$_POST['nama_perusahaan'];
		$no_telp=$_POST['no_telp'];
		$jenis_jaminan=$_POST['jenis_jaminan'];
		$nilai_jaminan=$_POST['nilai_jaminan'];
		
		$sqlcek = "SELECT * FROM Jaminan WHERE id='$id'";
		$ress = mysqli_query($conn, $sqlcek);
		$rows = mysqli_num_rows($ress);
		
		$sql = "UPDATE Jaminan SET
			nama_agen='". $nama_agen ."',
			nama_perusahaan='". $nama_perusahaan ."',
			no_telp='". $no_telp ."',
			jenis_jaminan='". $jenis_jaminan ."',
			nilai_jaminan='". $nilai_jaminan ."'
		WHERE id='". $id ."'";

		$ress = mysqli_query($conn, $sql);
		header("location: suretybond.php?act=update&msg=success");
	}
?>
