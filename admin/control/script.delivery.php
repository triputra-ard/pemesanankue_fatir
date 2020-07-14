<?php
include '../../database/connection.php';
include '../../function/function-by-tri.php';

if (isset($_POST['packed'])) {

  $id_admin = decrypt($_POST['admin']);
  $delivery = decrypt($_POST['delivery']);
  $checkoutid = decrypt($_POST['checkout']);

  // code...
  $sql = "UPDATE `pengiriman` SET
  status_pengiriman = 'DIPROSES', admin = '$id_admin' Where id_pengiriman = '$delivery'
  ";
  $query = mysqli_query($db,$sql) or die (mysqli_error($db));
  if ($query) {
    $checkout = mysqli_query($db,"UPDATE `checkout` SET admin = '$id_admin' Where id_checkout = '$checkoutid'");//Update status of checkout

    echo "<script>alert('Berhasil diperbarui');
    window.location.href='../table?view=neworder';</script>";
  }else {
    echo "<script>alert('Gagal');
    window.history.back();</script>";
  }
}elseif (isset($_POST['inshipping'])) {

  $id_admin = decrypt($_POST['admin']);
  $delivery = decrypt($_POST['delivery']);
  $checkoutid = decrypt($_POST['checkout']);
  // code...
  $courier = $_POST['courier'];
  $contact = $_POST['contact'];

  $currentdate = date("Y-m-d H:i:s");

  $sql = "UPDATE `pengiriman` SET
  status_pengiriman = 'DALAM PENGIRIMAN',
  admin = '$id_admin',
  kurir_pengiriman = '$courier',
  kontak_pengiriman = '$contact',
  tanggal_pengiriman = '$currentdate'
  Where id_pengiriman = '$delivery'
  ";
  $query = mysqli_query($db,$sql) or die (mysqli_error($db));
  if ($query) {
    $checkout = mysqli_query($db,"UPDATE `checkout` SET admin = '$id_admin' Where id_checkout = '$checkoutid'");//Update status of checkout

    echo "<script>alert('Berhasil diperbarui');
    window.location.href='../table?view=neworder';</script>";
  }else {
    echo "<script>alert('Gagal');
    window.history.back();</script>";
  }
}

 ?>
