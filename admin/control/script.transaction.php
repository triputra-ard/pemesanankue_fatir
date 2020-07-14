<?php
include '../../database/connection.php';
include '../../function/function-by-tri.php';

if (isset($_POST['accept'])) {
  $deliveryid = autokode("pengiriman", "d-");

  $id_admin = decrypt($_POST['admin']);
  $checkout = decrypt($_POST['checkout']);
  $product = decrypt($_POST['product']);
  $paymentid = decrypt($_POST['payment']);
  $quantity = $_POST['quantity'];

  $today = date("Y-m-d H:i:s");

  $sql = "UPDATE `checkout` SET
  status_checkout = 'DIPROSES',
  admin = '$id_admin' Where id_checkout = '$checkout'";
  $query = mysqli_query($db,$sql);
  if ($query) {
    $payment = mysqli_query($db,"UPDATE pembayaran SET status_pembayaran = 'LUNAS' Where id_pembayaran = '$paymentid'");//Update status of payment

    $delivery = mysqli_query($db,"INSERT into `pengiriman`(id_pengiriman,id_checkout,status_pengiriman,tanggal_pengiriman)
     VALUES('$deliveryid','$checkout',DEFAULT,'$today')");//Add new delivery

    $newpurchase = mysqli_query($db,"UPDATE `produk` SET
    `jumlah_produk` = `jumlah_produk`-'$quantity', `produk_jual` = `produk_jual`+'1'
    WHERE id_produk = '$product'
    ");//Update information of product

    echo "<script>alert('Berhasil diperbarui');
    window.location.href='../table?view=neworder';</script>";
  }else {
    echo "<script>alert('Gagal');
    window.history.back();</script>";
  }
}elseif (isset($_POST['decline'])) {
  $unlink = $_POST['photosremove'];

  $id_admin = decrypt($_POST['admin']);
  $checkout = decrypt($_POST['checkout']);
  $paymentid = decrypt($_POST['payment']);

  $sql = "UPDATE `checkout` SET
  status_checkout = 'MENUNGGU PEMBAYARAN',
  admin = '$id_admin' Where id_checkout = '$checkout'";
  $query = mysqli_query($db,$sql);
  if ($query) {
    $payment = mysqli_query($db,"UPDATE pembayaran SET status_pembayaran = 'BELUM LUNAS' Where id_pembayaran = '$paymentid'");//Update status of payment
    unlink($unlink);

    echo "<script>alert('Berhasil diperbarui');
    window.location.href='../table?view=transaction';</script>";
  }else {
    echo "<script>alert('Gagal');
    window.history.back();</script>";
  }
}elseif (isset($_POST['cancel'])) {

  $id_admin = decrypt($_POST['admin']);
  $checkout = decrypt($_POST['checkout']);
  $paymentid = decrypt($_POST['payment']);

  $sql = "UPDATE `checkout` SET
  status_checkout = 'PENDING',
  admin = '$id_admin' Where id_checkout = '$checkout'";
  $query = mysqli_query($db,$sql);
  if ($query) {
    $payment = mysqli_query($db,"DELETE FROM `pembayaran` Where id_pembayaran = '$paymentid'");//Update status of payment

    echo "<script>alert('Berhasil diperbarui');
    window.location.href='../table?view=transaction';</script>";
  }else {
    echo "<script>alert('Gagal');
    window.history.back();</script>";
  }
}



 ?>
