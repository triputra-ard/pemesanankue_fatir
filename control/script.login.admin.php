<?php
include '../database/connection.php';
include '../function/pagelink.php';

if (isset($_POST['admin'])) {
  $username = $_POST['user'];
  $password = $_POST['password'];

  $sql =  "SELECT * from admin WHERE username = '$username' AND password = '$password'";
  $query = mysqli_query($db,$sql);
  $fetch = mysqli_fetch_assoc($query);
  if (mysqli_num_rows($query)>0)
  {
    session_start();
    $_SESSION["id_admin"] = $fetch['id_admin'];
    $_SESSION["admin_name"] = $fetch['nama_admin'];
    $_SESSION["admin_username"] = $fetch['username'];
    $_SESSION["admin_password"] = $fetch['password'];

    header('location:'.$adminhome);
  }else {
    echo "<script> alert('Oh kami tidak mengenal anda. cek username dan password');
    window.history.back();</script>";
    }
  }
 ?>
