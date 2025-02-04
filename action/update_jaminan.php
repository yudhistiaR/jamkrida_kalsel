<?php
include("../sess_check.php");

if (isset($_POST['perbarui'])) {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $status_jaminan = $_POST['status'];
    $type_jaminan = '';

    if ($type == 'suretybond') {
        $type_jaminan = 'suretybond.php';
    } else if ($type == 'bankgaransi') {
        $type_jaminan = 'bank_garansi.php';
    } else if ($type == 'kreditmikro') {
        $type_jaminan = 'kredit_mikro.php';
    } else if ($type == 'barangjasa') {
        $type_jaminan = 'barang_jasa.php';
    }

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

        if ($type_jaminan != '') {
            header("Location: ../{$type_jaminan}?act=update&msg=success");
        } else {
            echo "Tipe jaminan tidak valid.";
        }
        exit();
    } else {
        echo "Data tidak ditemukan!";
    }
}
