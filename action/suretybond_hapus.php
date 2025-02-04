<?php
include("../sess_check.php");

$id = $_GET['id'];
$sql = "DELETE FROM pengajuan_jaminan WHERE id='" . $id . "'";
$ress = mysqli_query($conn, $sql);

header("location: ../suretybond.php?act=delete&msg=success");
