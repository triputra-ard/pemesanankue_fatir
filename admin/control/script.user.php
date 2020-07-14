<?php
include '../../database/connection.php';
include '../../function/function-by-tri.php';
$id = decrypt($_GET['id']);
if (isset($_GET['forgetpass'])) {
  $newpass = randomcode("4");

  $update = "UPDATE pengguna SET password = '$newpass' WHERE id_user = '$id'";

  $query = mysqli_query($db,$update);

  if ($query) {
    echo "<script>alert('Berhasil diperbarui');
    window.location.href='../table?view=user_register';</script>";
  }else {
    echo "<script>alert('Gagal');
    window.history.back();</script>";
  }
}elseif (isset($_GET['blocked'])) {
  $update = "UPDATE pengguna SET status_aktivasi = 'DIBLOKIR' WHERE id_user = '$id'";

  $query = mysqli_query($db,$update);

  if ($query) {
    echo "<script>alert('Berhasil diperbarui');
    window.location.href='../table?view=user_register';</script>";
  }else {
    echo "<script>alert('Gagal');
    window.history.back();</script>";
  }
}elseif (isset($_GET['notactive'])) {
  $update = "UPDATE pengguna SET status_aktivasi = 'TIDAK_AKTIF' WHERE id_user = '$id'";

  $query = mysqli_query($db,$update);

  if ($query) {
    echo "<script>alert('Berhasil diperbarui');
    window.location.href='../table?view=user_register';</script>";
  }else {
    echo "<script>alert('Gagal');
    window.history.back();</script>";
  }
}elseif (isset($_GET['active'])) {
  $update = "UPDATE pengguna SET status_aktivasi = 'AKTIF' WHERE id_user = '$id'";

  $query = mysqli_query($db,$update);

  if ($query) {
    echo "<script>alert('Berhasil diperbarui');
    window.location.href='../table?view=user_register';</script>";
  }else {
    echo "<script>alert('Gagal');
  window.history.back();</script>";
  }
}elseif (isset($_GET['delete'])) {
  $delete = "DELETE FROM pengguna WHERE id_user = '$id'";

  $query = mysqli_query($db,$delete);

  if ($query) {
    echo "<script>alert('Berhasil diperbarui');
    window.location.href='../table?view=user_notregister';</script>";
  }else {
    echo "<script>alert('Gagal');
    window.history.back();</script>";
  }
}

 ?>
