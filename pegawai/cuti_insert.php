<?php
include("sess_check.php");

if (!isset($conn)) {
    die("Kesalahan koneksi database.");
}

$perushaan	= $_POST['nama_perusahaan'];
$telpon	= $_POST['no_telp'];
$jenis	= $_POST['jenis_jaminan'];
$nilai	= $_POST['nilai_jaminan'];
$type	= $_POST['type'];
$stt = "Pending";


$sql 	= "INSERT INTO jaminan (nama_agen, nama_perusahaan , no_telp, jenis_jaminan, nilai_jaminan)
VALUES 	('$sess_username' ,'$perushaan','$telpon', '$jenis','$nilai')";
$query_one 	= mysqli_query($conn, $sql);
$id_jaminan = mysqli_insert_id($conn);

if ($query_one) {
	$sql 	= "INSERT INTO pengajuan_jaminan (user_id, jaminan_id  , type_jaminan, status)
										VALUES 	('$sess_userid'  ,'$id_jaminan','$type', '$stt')";
	$query 	= mysqli_query($conn, $sql);

	if ($query) {
		echo "<script type='text/javascript'>
				alert('Pengajuan jaminan berhasil!');
				document.location = 'cuti_waitapp.php';
			</script>";
	
} else {
	echo "<script type='text/javascript'>
			alert('Pengajuan jaminan gagal!.');
			document.location = 'cuti_create.php';
		</script>";

	}
}
?>
