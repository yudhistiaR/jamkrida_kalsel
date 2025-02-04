<?php
include("sess_check.php");

$no = $_POST['id'];
$aksi = $_POST['status'];
$reject = $_POST['keterangan_ditolak'];

$sql =  $sql = "UPDATE pengajuan_jaminan SET
				status='" . $aksi . "',
				keterangan_ditolak='" . $reject . "',
				admin_id='" . $sess_admid . "',
				update_at='" . date('Y-m-d H:i:s') . "'
			WHERE id='" . $no . "'";
$ress = mysqli_query($conn, $sql);
header("location: app_wait.php?act=update&msg=success");
