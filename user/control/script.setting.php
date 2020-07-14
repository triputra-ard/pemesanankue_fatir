<?php
include '../../database/connection.php';
include '../../function/function-by-tri.php';
if (isset($_POST['info'])) {
  $id = decrypt($_POST['id']);
  $fullname = $_POST['fullname'];
  $phone = $_POST['phone'];

  $update1 = "UPDATE `pengguna` SET nama_pengguna = '$fullname', nomor_telepon = '$phone' WHERE id_user = '$id'";
  $query1 = mysqli_query($db,$update1);

  if ($query1) {
    echo "<script>alert('Berhasil diperbarui. logout dan login kembali untuk melihat perubahan');
    window.location.href='../information?info=aboutme';</script>";
  }else {
    echo "<script>alert('Gagal');
    window.history.back()</script>";
  }
}elseif (isset($_POST['password'])) {
  $id = decrypt($_POST['id']);
  $password = $_POST['passwordtext'];
  $update2 = "UPDATE `pengguna` SET password = '$password' WHERE id_user = '$id'";
  $query2 = mysqli_query($db, $update2);

  if ($query2) {
    echo "<script>alert('Berhasil diperbarui. logout dan login kembali untuk melihat perubahan');
    window.location.href='../information?info=aboutme';</script>";
  }else {
    echo "<script>alert('Gagal');
    window.history.back()</script>";
  }
}elseif (isset($_POST['address'])) {
  $id = decrypt($_POST['id']);
  $address = $_POST['addresstext'];
  $update3 = "UPDATE `pengguna` SET alamat = '$address' WHERE id_user = '$id'";
  $query3 = mysqli_query($db,$update3);

  if ($query3) {
    echo "<script>alert('Berhasil diperbarui. logout dan login kembali untuk melihat perubahan');
    window.location.href='../information?info=aboutme';</script>";
  }else {
    echo "<script>alert('Gagal');
    window.history.back()</script>";
  }
}
 ?>
