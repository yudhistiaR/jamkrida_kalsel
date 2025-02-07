<?php
session_start();
include("dist/config/koneksi.php");

if (isset($_POST['login'])) {
  if (empty($_POST['username']) || empty($_POST['password'])) {
    header("location: login.php?err=empty");
    exit();
  }

  $username = htmlentities(trim(strip_tags($_POST['username'])));
  $password = htmlentities(trim(strip_tags($_POST['password'])));

  // Cek Admin
  $sqlAdmin = "SELECT * FROM admin WHERE user_adm=? AND pass_adm=? LIMIT 1";
  $stmtAdmin = mysqli_prepare($conn, $sqlAdmin);
  mysqli_stmt_bind_param($stmtAdmin, "ss", $username, $password);
  mysqli_stmt_execute($stmtAdmin);
  $ressAdmin = mysqli_stmt_get_result($stmtAdmin);
  $dataAdmin = mysqli_fetch_assoc($ressAdmin);

  // Cek User
  $sqlUser = "SELECT * FROM user WHERE username=? AND password=? LIMIT 1";
  $stmtUser = mysqli_prepare($conn, $sqlUser);
  mysqli_stmt_bind_param($stmtUser, "ss", $username, $password);
  mysqli_stmt_execute($stmtUser);
  $ressUser = mysqli_stmt_get_result($stmtUser);
  $dataUser = mysqli_fetch_assoc($ressUser);

  if ($dataAdmin) {
    if ($dataAdmin['hak_akses'] === 'Admin') {
      $_SESSION['admin'] = strtolower($dataAdmin['id_adm']);
      header("location: index.php?login=success");
      exit();
    } else {
      header("location: login.php?err=not_found");
      exit();
    }
  } elseif ($dataUser) {
    if ($dataUser['hak_akses'] === 'User') {
      $_SESSION['user'] = strtolower($dataUser['id']);
      header("location: pegawai/index.php?login=success");
      exit();
    } else {
      header("location: login.php?err=not_found");
      exit();
    }
  } else {
    header("location: login.php?err=invalid");
    exit();
  }
}
