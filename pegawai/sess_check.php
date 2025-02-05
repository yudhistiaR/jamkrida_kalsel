<?php
// memulai session
session_start();
// membaca nilai variabel session
$chk_sess = $_SESSION['user'];
// memanggil file koneksi
include("../dist/config/koneksi.php");
include("../dist/config/library.php");
// mengambil data pengguna dari tabel pengguna
$sql_sess = "SELECT * FROM user WHERE id='" . $chk_sess . "'";
$ress_sess = mysqli_query($conn, $sql_sess);
$row_sess = mysqli_fetch_array($ress_sess);
// menyimpan id_pengguna yang sedang login
$sess_pegawaiid = $row_sess['id'];
$sess_pegawainame = $row_sess['username'];
// mengarahkan ke halaman login.php apabila session belum terdaftar
if (!isset($chk_sess)) {
	header("location: ../login.php?login=false");
}
