<?php
include("sess_check.php");

$no  = isset($_GET['no']) ? $_GET['no'] : '0';
$sql = "DELETE FROM jaminan WHERE id = '$no'";
$query = mysqli_query($conn, $sql);

if ($query) {
  echo "<script type='text/javascript'>
      alert('Penghapusan Jaminan berhasil!');
      document.location = 'cuti_waitapp.php';
    </script>";
} else {
  echo "<script type='text/javascript'>
      alert('Terjadi kesalahan, silahkan coba lagi!.');
      document.location = 'cuti_waitapp.php';
    </script>";
}
