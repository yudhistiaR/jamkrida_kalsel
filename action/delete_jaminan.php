<?php
include("../sess_check.php");

$id = $_GET['id'];
$type = $_GET['type'];
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
    $sql = "DELETE FROM pengajuan_jaminan WHERE id='" . $id . "'";
    $ress = mysqli_query($conn, $sql);

    if ($type_jaminan != '') {
        header("location: ../{$type_jaminan}?act=delete&msg=success");
    } else {
        echo "Tipe jaminan tidak valid.";
    }
    exit();
} else {
    echo "Data tidak ditemukan!";
}
