<?php
include '../database/connection.php';
include '../function/function-by-tri.php';

if (isset($_POST['activation'])) {
  $code = $_POST['code'];

  $sql = "SELECT * FROM pengguna WHERE kode_aktivasi = '$code'";
  $mysql = mysqli_query($db,$sql);

  if (mysqli_num_rows($mysql) > 0) {
    $update = "UPDATE pengguna SET status_aktivasi = 'AKTIF' WHERE kode_aktivasi = '$code'";
    $updates = mysqli_query($db,$update);
    header('location:../status?status=activated');
  }else {
    echo "<script> alert('Oh sepertinya kode salah');
    window.history.back();</script>";
  }
}

 ?>
