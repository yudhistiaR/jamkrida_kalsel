<?php
session_start();
include("dist/config/koneksi.php");

if (isset($_POST['register'])) {
  if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['no_telpon']) || empty($_POST['email'])) {
    header("location: register.php?err=empty");
    exit();
  }

  $username = htmlentities(trim(strip_tags($_POST['username'])));
  $password = htmlentities(trim(strip_tags($_POST['password'])));
  $email = htmlentities(trim(strip_tags($_POST['email'])));
  $no_tel = htmlentities(trim(strip_tags($_POST['no_telpon'])));


    $sql="INSERT INTO user(username,password,email,telp_emp)
    VALUES('$username','$password','$email','$no_tel')";
    $ress = mysqli_query($conn, $sql);
    
    if($ress){
    echo "<script>alert('registrasi Berhasil!');</script>";
    echo "<script type='text/javascript'> document.location = 'register.php'; </script>";
    }else{
    echo("Error description: " . mysqli_error($conn));
    echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
    echo "<script type='text/javascript'> document.location = 'register.php'; </script>";
    }
}
