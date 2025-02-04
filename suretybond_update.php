<?php
include("sess_check.php");

// query database memperbarui data pada database
if (isset($_POST['perbarui'])) {
	$id = $_POST['id'];
	$status_jaminan = $_POST['status'];



	$sqlcek = "SELECT * FROM pengajuan_jaminan WHERE id='$id'";
	$ress = mysqli_query($conn, $sqlcek);
	$rows = mysqli_num_rows($ress);

	if ($rows > 0) {
		$sql = "UPDATE pengajuan_jaminan SET
				status='" . $status_jaminan . "',
				admin_id='" . $sess_admid . "',
				update_at='" . date('Y-m-d H:i:s') . "'
			WHERE id='" . $id . "'";

		$ress = mysqli_query($conn, $sql);
		header("location: suretybond.php?act=update&msg=success");
	} else {
		echo $id;
		echo "Data tidak ditemukan!";
	}
}
