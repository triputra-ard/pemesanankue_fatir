<?php
include '../database/connection.php';
include '../function/pagelink.php';

if (isset($_POST['user'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql =  "SELECT * from pengguna WHERE email = '$email' AND password = '$password'";
  $query = mysqli_query($db,$sql);
  $fetch = mysqli_fetch_assoc($query);
  if (mysqli_num_rows($query)>0)
  {
    session_start();

    $_SESSION["id"] = $fetch['id_user'];
    $_SESSION["name"] = $fetch['nama_pengguna'];
    $_SESSION["phone"] = $fetch['nomor_telepon'];
    $_SESSION["email"] = $fetch['email'];
    $_SESSION["password"] = $fetch['password'];
    $_SESSION["address"] = $fetch['alamat'];
    $_SESSION["status"] = $fetch['status_aktivasi'];

    header('location:'.$userhome);
  }else {
    echo "<script> alert('Oh kami tidak mengenal anda. cek email dan password');
    window.history.back();</script>";
  }
}
 ?>
